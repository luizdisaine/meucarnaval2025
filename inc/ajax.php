<?php 
function ajax_get_atracao() {
  $id = $_POST['id'];
  $post = get_post($id);
  if ($post) {
    $response = array(
      'title' => $post->post_title,
      'content' => apply_filters('the_content', $post->post_content),
    );
    echo json_encode($response);
  } else {
    echo json_encode(array('error' => 'Post not found'));
  }
  die();
}
add_action( 'wp_ajax_get_atracao', 'ajax_get_atracao' );
add_action( 'wp_ajax_nopriv_get_atracao', 'ajax_get_atracao' );

function ajax_get_page_content() {
  $id = isset($_POST['id']) ? intval($_POST['id']) : 0;
  
  if (!$id) {
    wp_send_json_error(array('message' => 'Invalid page ID'));
  }
  
  $post = get_post($id);
  
  if ($post && $post->post_type === 'page') {
    $response = array(
      'title' => $post->post_title,
      'content' => apply_filters('the_content', $post->post_content),
    );
    wp_send_json_success($response);
  } else {
    wp_send_json_error(array('message' => 'Page not found'));
  }
}
add_action( 'wp_ajax_get_page_content', 'ajax_get_page_content' );
add_action( 'wp_ajax_nopriv_get_page_content', 'ajax_get_page_content' );
?>