<?php 

$titlecontent = $attributes['titlecontent'];
$filteralign = $attributes['filteralign'];
$filterebl= cs_get_option('filter_item_disable_mb')
?>
<section
  class="js-container-async ajax-posts"
  <?php if ( !empty( $attributes['id'] ) ) : ?>
    id="ajax-posts-<?= esc_html( $attributes['id'] ); ?>"
    data-id="<?= esc_html( $attributes['id'] ); ?>"
  <?php endif; ?>
  data-post-type="<?= esc_html( implode(',', $attributes['post_type'] ) ); ?>"
  data-post-status="<?= esc_html( implode(',', $attributes['post_status'] ) ); ?>"
  data-quantity="<?= esc_html( $attributes['posts_per_page'] ); ?>"
  data-multiselect="<?= esc_html( $attributes['multiselect'] ); ?>"
  data-orderby="<?= esc_html( $attributes['orderby'] ); ?>"
  data-order="<?= esc_html( $attributes['order'] ); ?>"
>

    <?php if ($filterebl){?>
    <div class="anc-ajax-filter-box--m <?php echo esc_html($filteralign);?>">
        <?php if($titlecontent){?>
                <h4 class="ajax_epc_section_title"><?php echo esc_html($titlecontent);?></h4>
        <?php } ?>
        
          <?php if ( $query->have_posts() && $query->post_count > 1) :
          
          ?>
          
        <?php
            include( $this->get_local_template('partials/filters.php') );
         
        
        ?>
    <?php endif; ?>
    </div>
    <?php } ?>
  
  <div class="ajax-posts__status" style="display:none;"></div>

  <div class="ajax-posts__view">
    <aside class="ajax-posts__filters">
    
    </aside>
    <div class="ajax-posts__posts row row-cols-1 row-cols-md-2 row-cols-lg-<?php echo $attributes['column'] ?>">
     
      <?php  include( $this->get_local_template('partials/loop.php') );  ?>
        

         
    </div>
  </div>
  <div class="ajax-posts__spinner">
    <span class="ajax-posts__screen-reader-only"><?php _e('Loading', 'ttc-ajax-filter'); ?></span>
  </div>
</section>
<?php wp_reset_postdata(); ?>