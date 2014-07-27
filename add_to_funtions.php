<?php

/*
 * conditional meta box - by Alan Pasho, wordpressdev.net
 * the meta box will appear when a specific template is in use
 * add this code to your functions.php and change 'my-template_name.php' to the name
 * of your template file.
 */

function sm_meta_box_add()
{
  // get the template file name
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  
  if ($template_file == 'my-template_name.php') {
	  add_meta_box( 'sm-meta-box-id', 'Meta box Name', 'sm_meta_box_items', 'page', 'normal', 'high' );
  }  
}

add_action( 'add_meta_boxes', 'sm_meta_box_add' );

function sm_meta_box_items() {
	global $post;
  
  // your mete box code

}


function save_sm_meta_fields ( $post_id )
{
  $template_file = get_post_meta($post_id,'_wp_page_template',TRUE);
  
  if ($template_file == 'my-template_name.php') {
    
    // code to save meta box values
  }
}

add_action('save_post', 'save_sm_meta_fields', 20, 2);


?>
