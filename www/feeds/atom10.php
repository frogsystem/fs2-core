<?php
// Set header
header("Content-type: application/atom+xml");

// fs2 include path
set_include_path ( '.' );
define ( FS2_ROOT_PATH, "./../", TRUE );

// Inlcude DB Connection File
require( FS2_ROOT_PATH . "login.inc.php");

if ($FD->sql()->conn() )
{
    //Include Functions-Files
    include( FS2_ROOT_PATH . "includes/functions.php");
    include( FS2_ROOT_PATH . "includes/imagefunctions.php");

    //Include Library-Classes
    require ( FS2_ROOT_PATH . "libs/class_template.php" );
    require ( FS2_ROOT_PATH . "libs/class_fileaccess.php" );
    require ( FS2_ROOT_PATH . "libs/class_langDataInit.php" );

    if ($global_config_arr[virtualhost] == "") {
        $global_config_arr[virtualhost] = "http://example.com/";
    }

    // News Config + Infos
    $index = mysql_query("SELECT * FROM ".$global_config_arr[pref]."news_config", $FD->sql()->conn() );
    $news_config_arr = mysql_fetch_assoc($index);

    $index = mysql_query("SELECT news_date
                          FROM ".$global_config_arr[pref]."news
                          WHERE news_date <= UNIX_TIMESTAMP()
                          ORDER BY news_date DESC
                          LIMIT 1");

    $last_date[news_date] = mysql_result($index,0,"news_date");
    $last_date[news_updated] = date("Y-m-d\TH:i:s",$last_date[news_date]);
    $last_date[news_updated] .= "Z";
    
    //Feed Header ausgeben
    echo'<?xml version="1.0" encoding="utf-8"?>
<feed xmlns="http://www.w3.org/2005/Atom">
    <id>'.utf8_encode($global_config_arr[virtualhost]).'</id>
    <title>'.utf8_encode(htmlspecialchars($global_config_arr[title])).'</title>
    <updated>'.utf8_encode($last_date[news_updated]).'</updated>
    <link rel="self" href="'.utf8_encode($global_config_arr[virtualhost].'feeds/atom10.php').'" />
';

    $index = mysql_query("SELECT news_id, news_text, news_title, news_date, user_id
                          FROM ".$global_config_arr[pref]."news
                          WHERE news_date <= UNIX_TIMESTAMP()
                          AND news_active = 1
                          ORDER BY news_date DESC
                          LIMIT $news_config_arr[num_news]");

    while ($news_arr = mysql_fetch_assoc($index)) {
        $index2 = mysql_query("SELECT user_name FROM ".$global_config_arr[pref]."user WHERE user_id = $news_arr[user_id]");
        $news_arr[user_name] = mysql_result($index2,0,"user_name");

        $news_arr[news_updated] = date("Y-m-d\TH:i:s",$news_arr[news_date]);
        $news_arr[news_updated] .= "Z";
        
        // Item ausgeben
        echo'
    <entry>
        <id>'.utf8_encode($global_config_arr[virtualhost].'?go=comments&amp;id='.$news_arr[news_id]).'</id>
        <title>'.utf8_encode(killhtml($news_arr[news_title])).'</title>
        <updated>'.utf8_encode($news_arr[news_updated]).'</updated>
        <author>
            <name>'.utf8_encode($news_arr[user_name]).'</name>
        </author>
        <content><![CDATA['.utf8_encode(killfs($news_arr[news_text])).']]></content>
        <link rel="alternate" href="'.utf8_encode($global_config_arr[virtualhost].'?go=comments&amp;id='.$news_arr[news_id]).'" />
    </entry>
        ';
     }

    echo'
</feed>
    ';

    mysql_close($FD->sql()->conn() );
    
} else {
    //"Keine Verbindung"-Feed
    echo'<?xml version="1.0" encoding="utf-8"?>
        <feed xmlns="http://www.w3.org/2005/Atom">
        <id>http://example.com/</id>
        <title>Fehler</title>
        <updated>'.date("r").'</updated>
        </feed>
    ';
}
?>
