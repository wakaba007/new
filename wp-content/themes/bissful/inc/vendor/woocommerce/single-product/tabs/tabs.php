<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.8.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters( 'woocommerce_product_tabs', array() );

$productglobalmeta = get_post_meta ( get_the_ID(), 'woo_Gallery_option_global', true );

if ($productglobalmeta == true ){
    $tabstyle  = get_post_meta ( get_the_ID(), 'meta_tab_style_woo', true );
    
} else {
$tabstyle = cs_get_option('desc_tab_style_woo');
}


if ( ! empty( $product_tabs ) ) : ?>

<?php if ($tabstyle=='accordion'){?>
<div class="accordion bissful-p-accordion" id="xoopidescaccordion">
    


      
      	<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
      	
      	<?php if ($key == 'description'){
      	    
      	    $showacc = 'show';
      	    $areaex = 'true';
      	    $btnclass = '';
      	} else {
      	    
      	    $showacc = '';
      	     $areaex = 'false';
      	     $btnclass = 'collapsed';
      	    
      	} ?>
      	  <div class="accordion-item bissful-p-accordion-items">
    <h4 class="accordion-header" id="<?php echo esc_attr( $key ); ?>_accordion_title">
      <a class="accordion-button <?php echo esc_attr($btnclass);?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_<?php echo esc_attr( $key ); ?>" aria-expanded="<?php echo esc_attr($areaex);?>" aria-controls="collapse_<?php echo esc_attr( $key ); ?>">
       <?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
      </a>
    </h4>
    
    <div id="collapse_<?php echo esc_attr( $key ); ?>" class="accordion-collapse collapse <?php echo esc_attr($showacc);?>" aria-labelledby="<?php echo esc_attr( $key ); ?>_accordion_title" data-bs-parent="#xoopidescaccordion">
      <div class="accordion-body">
       	<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
      </div>
    </div>
     </div>
    <?php endforeach; ?>
    
 
 
 
</div>
<?php } elseif ($tabstyle=='tab') { ?>
<div class="bissful-ph-tab">
<!-- Nav tabs -->
<ul class="nav justify-content-center" id="myTab" role="tablist">
    
    	<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
    	    	<?php if ($key == 'description'){
      	    
      	    $linactiv = 'active';
      	    $areaex = 'true';
      	   
      	} else {
      	    
      	    $linactiv = '';
      	     $areaex = 'false';
      	    
      	} ?>
  <li class="nav-item" role="presentation">
    <a class="nav-link <?php echo esc_attr($linactiv);?>" id="<?php echo esc_attr( $key ); ?>-tab" data-bs-toggle="tab" data-bs-target="#<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="<?php echo esc_attr( $key ); ?>" 
    aria-selected="<?php echo esc_attr($areaex);?>"><?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?></a>
  </li>
  <?php endforeach;?>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    	<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
    	    	<?php if ($key == 'description'){
      	    
      	    $linactiv = 'active';
      	    $areaex = 'true';
      	   
      	} else {
      	    
      	    $linactiv = '';
      	     $areaex = 'false';
      	    
      	} ?>
  <div class="tab-pane <?php echo esc_attr($linactiv);?>" id="<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="<?php echo esc_attr( $key ); ?>-tab">
       	<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
      
  </div>
  <?php endforeach;?>

</div>

</div>
<?php } else { ?>
	<div class="woocommerce-tabs wc-tabs-wrapper bissful-vertical-tabs">
		<ul class="tabs wc-tabs" role="tablist">
			<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
				<li class="<?php echo esc_attr( $key ); ?>_tab" id="tab-title-<?php echo esc_attr( $key ); ?>" role="tab" aria-controls="tab-<?php echo esc_attr( $key ); ?>">
					<a href="#tab-<?php echo esc_attr( $key ); ?>">
						<?php echo wp_kses_post( apply_filters( 'woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>
		</ul>
		<div class="bissful-woo-tab-contents">
		<?php foreach ( $product_tabs as $key => $product_tab ) : ?>
			<div class="woocommerce-Tabs-panel woocommerce-Tabs-panel--<?php echo esc_attr( $key ); ?> panel entry-content wc-tab" id="tab-<?php echo esc_attr( $key ); ?>" role="tabpanel" aria-labelledby="tab-title-<?php echo esc_attr( $key ); ?>">
				<?php
				if ( isset( $product_tab['callback'] ) ) {
					call_user_func( $product_tab['callback'], $key, $product_tab );
				}
				?>
			</div>
		<?php endforeach; ?>
</div>
		<?php do_action( 'woocommerce_product_after_tabs' ); ?>
	</div>
<?php } ?>
<?php endif; ?>
