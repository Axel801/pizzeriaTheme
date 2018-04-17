<?php

remove_shortcode('gallery');
add_shortcode('gallery', 'altp_gallery_shortcode');
function altp_gallery_shortcode($atts) {

  global $post;
  $pid = $post->ID;
  $gallery = "";

  if (empty($pid)) {$pid = $post['ID'];}

  if (!empty( $atts['ids'] ) ) {
    $atts['orderby'] = 'post__in';
    $atts['include'] = $atts['ids'];
  }

  extract(shortcode_atts(array(
    'orderby' => 'menu_order ASC, ID ASC',
    'include' => '',
    'id' => $pid,
    'itemtag' => 'dl',
    'icontag' => 'dt',
    'captiontag' => 'dd',
    'columns' => 3,
    'size' => 'large',
    'link' => 'file'),
    $atts));

    $args = array('post_type' => 'attachment', 'post_status' => 'inherit', 'post_mime_type' => 'image', 'orderby' => $orderby);

    if (!empty($include)) {$args['include'] = $include;}
    else {
      $args['post_parent'] = $id;
      $args['numberposts'] = -1;
    }

    if ($args['include'] == "") { $args['orderby'] = 'date'; $args['order'] = 'asc';}

    $images = get_posts($args);
    $gallery .="<div class='row'>";
    foreach ( $images as $image ) {
      //print_r($image); /*see available fields*/
      $thumbnail = wp_get_attachment_image_src($image->ID, 'thumbnail');
      $thumbnail = $thumbnail[0];
      $full = wp_get_attachment_image_src( $image->ID, 'full');
      $full = $full[0];
      $gallery .= "
      <div class='col-12 col-md-6 col-lg-3 mb-4'>
        <a href=".$full." data-lightbox ='gallery'>
          <img src='".$thumbnail."' class='img-fluid'>
        </a>
      </div>
      ";
    }
    $gallery .="</div>";
    return $gallery;
  }

 ?>
