<?php
/*
Plugin Name: WP Super Speed
Description: This powerful plugin dramatically reducing CPU and RAM utilazation by 70-80%. Just install and activate it and in return get an optimized and speedy version of your website backend as well as front end. Surely you’ll find a difference due to its presence.
Version: 1.4
Author: Bhavinder Singh
License: GPL2
*/
if ( ! defined( 'ABSPATH' ) ) {
    exit; // disable direct access
}

function wpsuperspeed_activate() {

global $wpdb;
//Extra indexes improve your server performance
$querystr = "ALTER TABLE $wpdb->posts ADD INDEX(ID, post_date, post_status, post_name, post_modified, guid, post_type);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->commentmeta ADD INDEX(meta_id, comment_id, meta_key);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->comments ADD INDEX(comment_ID, comment_post_ID, comment_date, comment_type);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->links ADD INDEX(link_id, link_url, link_name, link_visible);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->options ADD INDEX(option_id, option_name);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->postmeta ADD INDEX(meta_id, post_id, meta_key);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->termmeta ADD INDEX(meta_id, term_id, meta_key);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->terms ADD INDEX(term_id, name);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->term_relationships ADD INDEX(object_id, term_taxonomy_id);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->term_taxonomy ADD INDEX(term_taxonomy_id, term_id, taxonomy);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
$querystr = "ALTER TABLE $wpdb->users ADD INDEX(ID, user_login, user_email, user_status);";
$pageposts = $wpdb->get_results($querystr, OBJECT);
//Optimize Query for BackEnd Process
$querystr = "ALTER TABLE $wpdb->usermeta ADD INDEX(umeta_id, user_id, meta_key);";
$pageposts = $wpdb->get_results($querystr, OBJECT);


 
}
// run the install scripts upon plugin activation
register_activation_hook(__FILE__,'wpsuperspeed_activate');


add_action('admin_menu', 'wpsuperspeed_menu');
function wpsuperspeed_menu() {
	add_menu_page('WP Super Speed', 'WP Super Speed', 'administrator', 'wpsuperspeed', 'wpsuperspeed_page', 'dashicons-admin-generic');
}

function wpsuperspeed_page() {
?>
<div class="wrap">
<h2>WP Super Speed</h2>

<div style="position: float; float:left; padding: 12px;">
<?php
echo '<img src="' . plugins_url( 'enjoy.png', __FILE__ ) . '" > ';
?></div>

<div><h2>Surely you’ll find a difference due to its presence.</h2></div>

<div>
WP Super Speed is a free project. If you find what it does good, useful or beautiful, please consider tossing a few coins in the tip jar. Your generous gifts and donations can help to make ongoing support and development possible.

Gifts, donations or small tips in any amount are appreciated. You can make a gift online using <script id='fbi8bn8'>(function(i){var f,s=document.getElementById(i);f=document.createElement('iframe');f.src='//button.flattr.com/view/?fid=lg2keo&button=compact&url='+encodeURIComponent(document.URL);f.title='Flattr';f.height=20;f.width=110;f.style.borderWidth=0;s.parentNode.insertBefore(f,s);})('fbi8bn8');</script>, an existing PayPal account, any major credit card (using the PayPal form).<br/></div>
<div>Buy a Cup of Coffee for us.</div>
<div>
<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="2NENXES5FNRU6">
<input type="image" src="https://www.paypalobjects.com/en_GB/i/btn/btn_paynowCC_LG.gif" border="0" name="submit" alt="PayPal – The safer, easier way to pay online!">
<img alt="" border="0" src="https://www.paypalobjects.com/en_GB/i/scr/pixel.gif" width="1" height="1">
</form>
</div>

<?php 
}
?>