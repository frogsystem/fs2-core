<?php
///////////////////////////
//// Show Announcement ////
///////////////////////////
$index = mysql_query ( "SELECT * FROM ".$global_config_arr['pref']."announcement", $db );
$announcement_arr = mysql_fetch_assoc ( $index );

if ( $announcement_arr['text'] != "" && $global_config_arr['activate_announcement'] == 1 ) {
	$announcement_arr['text'] = fscode ( $announcement_arr['text'], true, true, true );
	$template = get_template ( "announcement" );
	$template = str_replace ( "{announcement_text}", $announcement_arr['text'], $template );
}

if ( !( $global_config_arr['show_announcement'] == 1 || ( $global_config_arr['show_announcement'] == 2 && $global_config_arr['goto'] == $global_config_arr['home_real'] ) ) ) {
	unset ( $template );
}
?>