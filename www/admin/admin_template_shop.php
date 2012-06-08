<?php
$TEMPLATE_GO = 'tpl_shop';
$TEMPLATE_FILE = '0_shop.tpl';
$TEMPLATE_EDIT = array();

$TEMPLATE_EDIT[] = array (
    'name' => 'APPLET_ITEM',
    'title' => $TEXT['template']->get('shop_applet_item_title'),
    'description' => $TEXT['template']->get('shop_applet_item_desc'),
    'rows' => 20,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'item_titel', 'text' => $TEXT['template']->get('shop_item_title') ),
        array ( 'tag' => 'item_url', 'text' => $TEXT['template']->get('shop_item_url') ),
        array ( 'tag' => 'item_price', 'text' => $TEXT['template']->get('shop_item_price') ),
        array ( 'tag' => 'item_image', 'text' => $TEXT['template']->get('shop_item_image') ),
        array ( 'tag' => 'item_image_url', 'text' => $TEXT['template']->get('shop_item_image_url') ),
        array ( 'tag' => 'item_small_image', 'text' => $TEXT['template']->get('shop_item_small_image') ),
        array ( 'tag' => 'item_small_image_url', 'text' => $TEXT['template']->get('shop_item_small_image_url') ),
    )
);

$TEMPLATE_EDIT[] =  array (
    'name' => 'APPLET_BODY',
    'title' => $TEXT['template']->get('shop_applet_body_title'),
    'description' => $TEXT['template']->get('shop_applet_body_desc'),
    'rows' => 15,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'applet_items', 'text' => $TEXT['template']->get('shop_applet_body_items') ),
    )
);

$TEMPLATE_EDIT[] = array (
    'name' => 'SHOP_ITEM',
    'title' => $TEXT['template']->get('shop_main_item_title'),
    'description' => $TEXT['template']->get('shop_main_item_desc'),
    'rows' => 20,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'item_titel', 'text' => $TEXT['template']->get('shop_item_title') ),
        array ( 'tag' => 'item_text', 'text' => $TEXT['template']->get('shop_item_text') ),
        array ( 'tag' => 'item_url', 'text' => $TEXT['template']->get('shop_item_url') ),
        array ( 'tag' => 'item_price', 'text' => $TEXT['template']->get('shop_item_price') ),
        array ( 'tag' => 'item_image', 'text' => $TEXT['template']->get('shop_item_image') ),
        array ( 'tag' => 'item_image_url', 'text' => $TEXT['template']->get('shop_item_image_url') ),
        array ( 'tag' => 'item_image_viewer_url', 'text' => $TEXT['template']->get('shop_item_image_viewer_url') ),
        array ( 'tag' => 'item_small_image', 'text' => $TEXT['template']->get('shop_item_small_image') ),
        array ( 'tag' => 'item_small_image_url', 'text' => $TEXT['template']->get('shop_item_small_image_url') ),
    )
);

$TEMPLATE_EDIT[] =  array (
    'name' => 'SHOP_BODY',
    'title' => $TEXT['template']->get('shop_main_body_title'),
    'description' => $TEXT['template']->get('shop_main_body_desc'),
    'rows' => 20,
    'cols' => 66,
    'help' => array (
        array ( 'tag' => 'shop_items', 'text' => $TEXT['template']->get('shop_main_body_items') ),
    )
);

// Init Template-Page
echo templatepage_init ( $TEMPLATE_EDIT, $TEMPLATE_GO, $TEMPLATE_FILE );
?>
