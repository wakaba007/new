<?php

if ( ! function_exists( 'teconce_elements_items' ) ) {
    function teconce_elements_items(  $type = '', $query_args = array() ) {
  
      $options = array();
  
      switch( $type ) {
  
        case 'pages':
        case 'page':
        $pages = get_pages( $query_args );
  
        if ( !empty($pages) ) {
          foreach ( $pages as $page ) {
            $options[$page->post_title] = $page->ID;
          }
        }
        break;
  
        case 'posts':
        case 'post':
        $posts = get_posts( $query_args );
  
        if ( !empty($posts) ) {
          foreach ( $posts as $post ) {
            $options[$post->post_title] = lcfirst($post->ID);
          }
        }
        break;
  
        case 'tags':
        case 'tag':
  
        if (isset($query_args['taxonomies']) && taxonomy_exists($query_args['taxonomies'])) {
          $tags = get_terms( $query_args['taxonomies'], $query_args['args'] );
            if ( !is_wp_error($tags) && !empty($tags) ) {
              foreach ( $tags as $tag ) {
                $options[$tag->name] = $tag->term_id;
            }
          }
        }
        break;
  
        case 'categories':
        case 'category':
  
        if (isset($query_args['taxonomy']) && taxonomy_exists($query_args['taxonomy'])) {
          $categories = get_categories( $query_args );
            if ( !empty($categories) && is_array($categories) ) {
  
              foreach ( $categories as $category ) {
                 $options[$category->name] = $category->term_id;
              }
            }
        }
        break;

        case 'products':
            case 'product':
            $product_posts = get_posts( $query_args );
      
            if ( !empty($product_posts) ) {
              foreach ( $product_posts as $product_post ) {
                $options[$product_post->post_title] = lcfirst($product_post->ID);
              }
            }
            break;
  
      }
  
      return $options;
  
    }
  }

?>