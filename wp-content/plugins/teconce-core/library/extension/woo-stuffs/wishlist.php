<?php

  function teconce_yith_wcwl_get_items_count($settings = null, $item= null) {
    ob_start();
   	$icon_title = $item['icon_heading'];
						$icon_sub_title = $item['icon_sub_title'];
    ?>
      <a href="<?php echo esc_url( YITH_WCWL()->get_wishlist_url() ); ?>" class="teconce-wishlist-header-bar">
          <?php \Elementor\Icons_Manager::render_icon( $settings['wishlist_icon'], [ 'aria-hidden' => 'true' ] ); ?>
        <span class="yith-wcwl-items-count">
         <?php echo esc_html( yith_wcwl_count_all_products() ); ?>
        </span>
        
        	<?php if ($icon_title) { ?>
                                        <span class="teconce-hicon-content">
                                        <p class="teconce-hicon-label"><?php echo esc_html($icon_title); ?></p>
                                        <?php if ($icon_sub_title) { ?>
                                            <p class="teconce-hicon-value"><?php echo esc_html($icon_sub_title); ?></p>
                                        <?php } ?>
                                    </span>
									<?php } ?>
      </a>
    <?php
    return ob_get_clean();
  }

  add_shortcode( 'teconce_wcwl_items_count', 'teconce_yith_wcwl_get_items_count' );



  function teconce_yith_wcwl_ajax_update_count() {
    wp_send_json( array(
      'count' => yith_wcwl_count_all_products()
    ) );
  }

  add_action( 'wp_ajax_yith_wcwl_update_wishlist_count', 'teconce_yith_wcwl_ajax_update_count' );
  add_action( 'wp_ajax_nopriv_yith_wcwl_update_wishlist_count', 'teconce_yith_wcwl_ajax_update_count' );



  function teconce_yith_wcwl_enqueue_custom_script() {
    wp_add_inline_script(
      'jquery-yith-wcwl',
      "
        jQuery( function( $ ) {
          $( document ).on( 'added_to_wishlist removed_from_wishlist', function() {
            $.get( yith_wcwl_l10n.ajax_url, {
              action: 'yith_wcwl_update_wishlist_count'
            }, function( data ) {
              $('.yith-wcwl-items-count').children('i').html( data.count );
            } );
          } );
        } );
      "
    );
  }

  add_action( 'wp_enqueue_scripts', 'teconce_yith_wcwl_enqueue_custom_script', 20 );
