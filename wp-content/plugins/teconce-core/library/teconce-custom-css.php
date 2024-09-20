<?php
/**
 *  Add Dynamic css to header
 * @version    1.0
 * @author        Teconce
 * @URI        http://teconce.com
 */


/**
 * Add extension CSS.
 */
function teconce_dynamic_css() {

    ob_start();
    $teconce_options = get_option('teconce_options');
    $primarycolor = !empty($teconce_options['color-set']['primary_color']) ? $teconce_options['color-set']['primary_color'] : '#BC7B77';
    $primarytxcolor = !empty($teconce_options['color-set']['primary-text-color']) ? $teconce_options['color-set']['primary-text-color'] : '';
    $secndcolor = !empty($teconce_options['color-set']['secondary-color']) ? $teconce_options['color-set']['secondary-color'] : '';;
    $secndtxtcolor = !empty($teconce_options['color-set']['secondary-text-color']) ? $teconce_options['color-set']['secondary-text-color'] : '';
    $globalwdth1400 = !empty($teconce_options['gloabal_width_1400']) ? $teconce_options['gloabal_width_1400'] : '';
    $globalwdth1200 = !empty($teconce_options['gloabal_width_1200']) ? $teconce_options['gloabal_width_1200'] : '';

    $bodyfontfamily = !empty($teconce_options['paragraph_typo']['font-family']) ? $teconce_options['paragraph_typo']['font-family'] : '';
    
    $altfontfamily = !empty($teconce_options['alt_typo']['font-family']) ? $teconce_options['alt_typo']['font-family'] : '';
    
    $maintxtcolor = !empty($teconce_options['color-set']['main_text_colot']) ? $teconce_options['color-set']['main_text_colot'] : '';
    $altcolortxt = !empty($teconce_options['alter_text_color']) ? $teconce_options['alter_text_color'] : '';
    $lightcolor = !empty($teconce_options['light_color']) ? $teconce_options['light_color'] : '#ffffff';
    $white100color = !empty($teconce_options['light_100_color']) ? $teconce_options['light_100_color'] : '#FCF8F8';
    $elementorwdthebl = !empty($teconce_options['elementor-width-overwrite']) ? $teconce_options['elementor-width-overwrite'] : '';
    $elementorwdthmain = !empty($teconce_options['overwrite-elem-width']) ? $teconce_options['overwrite-elem-width'] : '';
    $srcbtnclr = !empty($teconce_options['elementor_content']['search_icon_clr']) ? $teconce_options['elementor_content']['search_icon_clr'] : '';

    $header_phone_number_color = !empty($teconce_options['Phone-Number-color']) ? $teconce_options['Phone-Number-color'] : '';
    $header_phone_number_hover_color = !empty($teconce_options['Phone-Number-hover-color']) ? $teconce_options['Phone-Number-hover-color'] : '';

   $brown200 = !empty($teconce_options['brown_200_color']) ? $teconce_options['brown_200_color'] : '#E5DACF';
   
   $black900 = !empty($teconce_options['black_900_color']) ? $teconce_options['black_900_color'] : '#0D0D0D';
   
   $black800 = !empty($teconce_options['black_800_color']) ? $teconce_options['black_800_color'] : '#262626';
   
   $black700 = !empty($teconce_options['black_700_color']) ? $teconce_options['black_700_color'] : '#252525';
   

    $primarycolorrgb = teconce_rgb_to_hex($primarycolor);
    $primarycolor1p = teconce_hexto_rgb($primarycolorrgb, 0.1);
    ?>
    
    :root {
    --white: <?php echo esc_html($lightcolor);?>;
    --white-100: <?php echo esc_html($white100color);?>;
    --brown: <?php echo esc_html($primarycolor);?>;
    --brown-200: <?php echo esc_html($brown200);?>;
    --black-900: <?php echo esc_html($black900);?>;
    --black-800: <?php echo esc_html($black800);?>;
    --black-700: <?php echo esc_html($black700);?>;

    --font-arimo: <?php echo $bodyfontfamily;?>;
    --font-bona-nova: <?php echo $altfontfamily;?>;

    --font-size-11: 16px;
    --font-size-12: 16px;
    --font-size-14: 14px;
    --font-size-16: 16px;
    --font-size-21: 21px;
    --font-size-27: 27px;
    --font-size-34: 34px;
    --font-size-50: 50px;
    --font-size-105: 105px;


    --line-height-12: 12.1px;
    --line-height-18: 18.3px;
    --line-height-20: 20px;
    --line-height-27: 27px;
    --line-height-28: 28px;
    --line-height-41: 41px;
    --line-height-54: 54px;
    --line-height-100: 100px;
    --transition-base: all 0.3s;
}
    .homeTwo__header-phone-number{
        -webkit-background-clip: text !important;
        -webkit-text-fill-color : <?php echo esc_html($header_phone_number_color); ?>;
        background : <?php echo esc_html($header_phone_number_hover_color); ?>;
    }

    .teconce-single-product-box p.price,
    .woocommerce-tabs ul.tabs li.active a{
    color:<?php echo esc_html($primarycolor); ?>
    }

    .single_add_to_cart_button, .added_to_cart.wc-forward,
    span.teconce-new-tag,
    .woocommerce-tabs ul.tabs li.active a:before{
    background-color:<?php echo esc_html($primarycolor); ?>
    }

    .single_add_to_cart_button, .added_to_cart.wc-forward{
    border-color:<?php echo esc_html($primarycolor); ?>
    }

    .single_add_to_cart_button, .added_to_cart.wc-forward,
    span.teconce-new-tag{
    color:<?php echo esc_html($primarytxcolor); ?>
    }
    .search-wrapper svg{
    fill:<?php echo esc_html($srcbtnclr); ?>
    }
    .weekly-deal-single-product-cart-btn a{
    background:<?php echo esc_html($primarycolor1p); ?>;
    }
    @media (min-width: 1200px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: <?php echo esc_html($globalwdth1200); ?>px;
    }
    }

    @media (min-width: 1400px){
    .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
    max-width: <?php echo esc_html($globalwdth1400); ?>px;
    }
    }

    <?php if ($elementorwdthebl) { ?>
        .elementor-section.elementor-section-boxed > .elementor-container,
        .e-con>.e-con-inner{
        max-width: <?php echo esc_html($elementorwdthmain); ?>px !important;
        }
    <?php } ?>

    <?php
    $output = ob_get_clean();

    if (!$output) {
        return;
    }

    $css = '<style id="teconce-swatches-css" type="text/css">';
    $css .= $output;
    $css .= '</style>';

    echo teconce_compress_css_lines($css);
}

add_action('wp_head', 'teconce_dynamic_css');