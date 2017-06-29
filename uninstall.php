<?php
/**
 * Runs on Uninstall of ICustomizer
 *
 * @package     ICustomizer
 * @author      INFORMATUX
 * @copyright   2017 INFORMATUX
 * @license     GPL-3.0+
 * @link      	https://informatux.com/category/WORDPRESS
 */

// ------------------------------------------------
// if uninstall.php is not called by WordPress, die
// ------------------------------------------------
if (!defined('WP_UNINSTALL_PLUGIN')) {
    die;
}
// ------------------------------------------------

// -------------- 
// Delete Options
// --------------
//$options =[
//	'rhprint_text',
//	'rhprint_icon',
//	'rhprint_comments',
//	'rhprint_message',
//];
// --------------
//foreach ( $options as $option ) {
//	if ( get_option( $option ) ) {
//		delete_option( $option );
//	}
//}
// --------------

// ------------
// Delete Pages
// ------------
//wp_trash_post( 101 );
// ------------

// -----------------------------
// Delete Custom Post Type posts
// -----------------------------
//$wpdb->query( "DELETE FROM {$wpdb->posts} WHERE post_type IN ( 'my_custom_post_type' );" );
//$wpdb->query( "DELETE FROM {$wpdb->postmeta} meta LEFT JOIN {$wpdb->posts} posts ON posts.ID = meta.post_id WHERE wp.ID IS NULL;" );
// -----------------------------

// -----------------------------
// for site options in Multisite
// -----------------------------
//delete_site_option($option_name);
//if (is_multisite()) {
//    global $wpdb;
//    $blogs = $wpdb->get_results("SELECT blog_id FROM {$wpdb->blogs}", ARRAY_A);
//
//    if(!empty($blogs)) {
//        foreach($blogs as $blog) {
//	    switch_to_blog($blog['blog_id']);
//            delete_option('option_name');
//        }
//    }
//} else {
//    delete_option('option_name');
//}
// -----------------------------

// ----------------------------
// drop a custom database table
// ----------------------------
//global $wpdb;
//$wpdb->query("DROP TABLE IF EXISTS {$wpdb->prefix}mytable");
// ----------------------------
?>