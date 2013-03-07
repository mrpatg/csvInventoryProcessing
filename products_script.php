<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once(ABSPATH . 'wp-admin/includes/image.php');
require_once(ABSPATH . 'wp-admin/includes/file.php');
require_once(ABSPATH . 'wp-admin/includes/media.php');
require_once( $_SERVER['DOCUMENT_ROOT'] . '/wp-load.php' );

$file = fopen("itemlist_full.csv","r");
while(! feof($file))
	{
	$itemlist = fgetcsv($file, 0, ";");
	$post = array(
		'post_title'    => $itemlist[1],
		'post_content'  => $itemlist[2],
		'post_status'   => 'publish',
		'post_author'   => 1,
		'post_type'	  => 'product'
	);

	$post_id = wp_insert_post( $post );

	add_post_meta($post_id, '_sku', $itemlist[14]);
	add_post_meta($post_id, '_price', $itemlist[8]);
	add_post_meta($post_id, '_stock', $itemlist[38]);
	add_post_meta($post_id, '_stock_status', 'instock');
	add_post_meta($post_id, '_backorders', 'no');
	
	$attach_id = wp_insert_attachment( $attachment, "", $post_id );
    $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
    wp_update_attachment_metadata( $attach_id,  $attach_data );
	}
fclose($file);

?>