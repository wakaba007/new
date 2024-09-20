<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Bissful
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */

#-----------------------------------------------------------------#
# Theme Option Compatibility
#-----------------------------------------------------------------#/
if (class_exists('Teconce_Core')) {

    function cs_get_option($option, $name = NULL, $default = NULL) {
        $base_options = get_option('teconce_options');

        if ($name == NULL) {

            if (isset($base_options[$option])) {
                return $base_options[$option];
            } else {
                return false;
            }

        } else if (isset($base_options[$option][$name])) {

            return $base_options[$option][$name];

        } else if ($default != NULL) {

            return $default;

        } else {

            return false;

        }
    }


} else {
    function cs_get_option($option_name = '', $default = '') {
        return false;
    }

}

/*  Register Fonts  */
function bissful_fonts_url() {
    $fonts_url = '';

    /* Translators: If there are characters in your language that are not
    * supported by Lora, translate this to 'off'. Do not translate
    * into your own language.
    */
    $inter = _x('on', 'Inter font: on or off', 'bissful');

    /* Translators: If there are characters in your language that are not
    * supported by Open Sans, translate this to 'off'. Do not translate
    * into your own language.
    */
    $open_sans = _x('on', 'Open Sans font: on or off', 'bissful');

    if ('off' !== $inter || 'off' !== $open_sans) {
        $font_families = array();

        if ('off' !== $inter) {
            $font_families[] = 'Inter:400,500,600,700';
        }

        if ('off' !== $open_sans) {
            $font_families[] = 'Open Sans:700italic,400,800,600';
        }

        $query_args = array(
            'family' => urlencode(implode('|', $font_families)),
            'subset' => urlencode('latin,latin-ext'),
        );

        $fonts_url = add_query_arg($query_args, 'https://fonts.googleapis.com/css');
    }

    return esc_url_raw($fonts_url);
}

function bissful_body_classes($classes) {
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}

add_filter('body_class', 'bissful_body_classes');

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function bissful_pingback_header() {
    if (is_singular() && pings_open()) {
        printf('<link rel="pingback" href="%s">', esc_url(get_bloginfo('pingback_url')));
    }
}

add_action('wp_head', 'bissful_pingback_header');

#-----------------------------------------------------------------#
# Teconce Header Builder Start
#-----------------------------------------------------------------#/

if (!function_exists('teconce_header_builder')) {
    function teconce_header_builder() {

        $page_meta = get_post_meta(get_the_ID(), 'teconce_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
        $header_style = '';
        if ($custom_options == 'enabled') {
            if ($page_meta['select_header_blocks_meta']) {
                $header = $page_meta['select_header_blocks_meta'];
            } else {
                $header_style = $page_meta['teconce-header-style'];
            }
        } else {
            $header_style = cs_get_option('teconce-header-style');
        }

        $stacked_header_enable = cs_get_option('stacked_header_enable');

        if (!empty($stacked_header_enable)) {
            $stackclass = 'stacked-header';
        } else {
            $stackclass = 'no-stacked-header';
        }
        if (!empty($header)) {
            echo '<header class="teconce-header-builder teconce-site-header ' . $stackclass . '"><div class="header-content-holder">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($header)) . '</div></header>';
        } else {
            if ($header_style == 'style-one') {
                get_template_part('template-parts/header/header-style', 'one');
            } elseif ($header_style == 'style-two') {
                get_template_part('template-parts/header/header-style', 'two');
            } elseif ($header_style == 'style-three') {
                get_template_part('template-parts/header/header-style', 'three');
            } else {
                get_template_part('template-parts/header/header-style', 'three');
            }
        }
    }
}

#-----------------------------------------------------------------#
# teconce Footer Builder
#-----------------------------------------------------------------#/

if (!function_exists('teconce_footer_builder')) {
    function teconce_footer_builder() {

        $page_meta = get_post_meta(get_the_ID(), 'teconce_page_options', true);
        $custom_options = (!empty($page_meta['global_page_meta'])) ? $page_meta['global_page_meta'] : 'disabled';
        $footer_style = '';
        if ($custom_options == 'enabled') {
            if ($page_meta['select_footer_blocks_meta']) {
                $footer = $page_meta['select_footer_blocks_meta'];
            } else {
                $footer_style = $page_meta['teconce-footer-style'];
            }
        } else {
            $footer_style = cs_get_option('teconce-footer-style');
        }

        if (!empty($footer)) {
            echo '<footer class="teconce-footer">' . \Elementor\Plugin::$instance->frontend->get_builder_content(intval($footer)) . '</footer>';
        } else {
            if ($footer_style == 'style-two') {
                get_template_part('template-parts/footer/footer', 'two');
            } elseif ($footer_style == 'style-three') {
                get_template_part('template-parts/footer/footer', 'three');
            } else {
                get_template_part('template-parts/footer/footer', 'default');
            }
        }

    }

}

#-----------------------------------------------------------------#
# bissful Paginantion
#-----------------------------------------------------------------#/
if (!function_exists('bissful_page_navs')): /**
 * Displays post pagination links
 *
 * @since bissful 1.0
 */
    function bissful_page_navs($query = false) {
        global $wp_query;
        if ($query) {
            $temp_query = $wp_query;
            $wp_query = $query;
        }
        // Return early if there's only one page.
        if ($GLOBALS['wp_query']->max_num_pages < 2) {
            return;
        }
        ?>
        <!-- pagination -->
        <div class="bissful-page-numbers mt-80">
            <?php
            $big = 999999999; // need an unlikely integer
            echo paginate_links(array(
                'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format' => '?paged=%#%',
                'current' => max(1, get_query_var('paged')),
                'total' => $wp_query->max_num_pages,
                'type' => 'list',
                'prev_text' => '<i class="fa-solid fa-arrow-left"></i>',
                'next_text' => '<i class="fa-solid fa-arrow-right"></i>'
            ));
            ?>
        </div>

        <?php
        if (isset($temp_query)) {
            $wp_query = $temp_query;
        }
    }
endif;

if (!function_exists('bissful_page_paging_nav')) {
    function bissful_page_paging_nav($max_num_pages = false, $args = array()) {

        if (get_query_var('paged')) {
            $paged = get_query_var('paged');
        } elseif (get_query_var('page')) {
            $paged = get_query_var('page');
        } else {
            $paged = 1;
        }

        if ($max_num_pages === false) {
            global $wp_query;
            $max_num_pages = $wp_query->max_num_pages;
        }


        $defaults = array(
            'nav' => 'load',
            'posts_per_page' => get_option('posts_per_page'),
            'max_pages' => $max_num_pages,
            'post_type' => 'post',
        );


        $args = wp_parse_args($args, $defaults);

        if ($max_num_pages < 2) {
            return;
        }


        $big = 999999999; // need an unlikely integer

        $links = paginate_links(array(
            'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
            'format' => '?paged=%#%',
            'current' => $paged,
            'total' => $max_num_pages,
            'prev_next' => true,
            'prev_text' => esc_html__('Previous', 'bissful'),
            'next_text' => esc_html__('Next', 'bissful'),
            'end_size' => 1,
            'mid_size' => 2,
            'type' => 'list',
        ));

        if (!empty($links)): ?>
            <div class="bissful-common-paginav bissful-page-pagination flex text-center">
                <?php echo wp_kses_post($links); ?>
            </div>
            <div class="empty-space marg-sm-b60"></div>
        <?php endif;
    }
}

#-----------------------------------------------------------------#
# Bissful Breadcrumb Markup
#-----------------------------------------------------------------#/
if (!function_exists('bissful_breadcrumb_markup')) {
    function bissful_breadcrumb_markup() {
        $postId = is_home() ? get_option('page_for_posts') : get_the_ID();
        $page_meta = get_post_meta($postId, 'teconce_page_options', true);
        $breadcrumb_bg_image = cs_get_option('breadcrumb_shape_image');
        if (is_array($page_meta) && !empty($page_meta['breadcrumb_shape_image']['url'])) {
            $breadcrumb_img = $page_meta['breadcrumb_shape_image']['url'];
        } elseif (is_array($breadcrumb_bg_image) && !empty($breadcrumb_bg_image['url'])) {
            $breadcrumb_img = $breadcrumb_bg_image['url'];
        } else {
            $breadcrumb_img = '';
        }

        if (is_post_type_archive()) {
            $breadcrumb_custom_title = post_type_archive_title('', false);
        } else {
            if (is_home() && is_front_page()) {
                $breadcrumb_custom_title = __("Blog", "bissful");
            } else {
                if (is_home()) {
                    $page_id = get_option('page_for_posts');
                } else {
                    $page_id = get_the_ID();
                }
                $breadcrumb_custom_title = !empty($page_meta['custom_breadcrumb_title']) ? $page_meta['custom_breadcrumb_title'] : get_the_title($page_id);
            }

        }

        if (is_array($page_meta) && $page_meta['page_breadcrumb'] || is_archive() || is_single() || is_404() || is_home()) {
            $post_title = get_the_title();
            $post_title_length = strlen($post_title);
            if($post_title_length > 70){
                $flex_column = 'flex-column';
                $col_md = 'col-md-12';
                $breadcrumb_big_title_class = "breadcrumb_long_title";
                $text_break = 'text-break';
                $breadcrumb_float = 'float-start';
                $justify_content_between = '';
                $gutter = "gy-3";
            }else{
                $flex_column = '';
                $col_md = 'col-md-6';
                $breadcrumb_big_title_class = '';
                $text_break = '';
                $breadcrumb_float = '';
                $justify_content_between = 'justify-content-between';
                $gutter = "";
            }
            ?>
            <!-- Bredcrumb Start -->
            <section class="sw_bredcrumb nb-bg1 nb-mp sw--Bg-color-white-100 <?php echo esc_attr($breadcrumb_big_title_class); ?>">
                <div class="sw_bredcrumb_wrapper">
                    <div class="container">
                        <div class="sw_bredcrumb_wrapper_container row nb-dw <?php echo esc_attr($justify_content_between . $flex_column . $gutter); ?>">
                            <div class="sw_bredcrumb_shep wow fadeInUp d-none d-lg-block" data-wow-delay="0.5s">
                                <img src="<?php echo esc_url($breadcrumb_img); ?>" alt="">
                            </div>
                            <div class="sw_bredcrumb_left col-12 <?php echo esc_attr($col_md); ?>">
                                <div class="sw-about-contain <?php echo esc_attr($text_break); ?>">
                                    <h1 class="sw--fs-27 sw--color-black-900 ">
                                        <?php
                                        echo esc_html($breadcrumb_custom_title);
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="sw_bredcrumb_right col-12 <?php echo esc_attr($col_md); ?>">
                                <div class="<?php echo esc_attr($breadcrumb_float); ?>">
                                    <?php bissful_breadcrumbs(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bredcrumb End -->
            <?php
        }
    }
}

if (!function_exists('bissful_breadcrumb_markup_alt')) {
    function bissful_breadcrumb_markup_alt() {
        $postId = is_home() ? get_option('page_for_posts') : get_the_ID();
        $page_meta = get_post_meta($postId, 'teconce_page_options', true);
        $breadcrumb_bg_image = cs_get_option('breadcrumb_shape_image');
        if (is_array($page_meta) && !empty($page_meta['breadcrumb_shape_image']['url'])) {
            $breadcrumb_img = $page_meta['breadcrumb_shape_image']['url'];
        } elseif (is_array($breadcrumb_bg_image) && !empty($breadcrumb_bg_image['url'])) {
            $breadcrumb_img = $breadcrumb_bg_image['url'];
        } else {
            $breadcrumb_img = '';
        }

        if (is_post_type_archive()) {
            $breadcrumb_custom_title = post_type_archive_title('', false);
        } else {
            if (is_home() && is_front_page()) {
                $breadcrumb_custom_title = __("Blog", "bissful");
            } else {
                if (is_home()) {
                    $page_id = get_option('page_for_posts');
                } else {
                    $page_id = get_the_ID();
                }
                $breadcrumb_custom_title = !empty($page_meta['custom_breadcrumb_title']) ? $page_meta['custom_breadcrumb_title'] : get_the_title($page_id);
            }

        }


            ?>
            <!-- Bredcrumb Start -->
            <section class="sw_bredcrumb nb-bg1 nb-mp sw--Bg-color-white-100">
                <div class="sw_bredcrumb_wrapper">
                    <div class="container">
                        <div class="sw_bredcrumb_wrapper_container row nb-dw justify-content-between">
                            <div class="sw_bredcrumb_shep wow fadeInUp d-none d-lg-block" data-wow-delay="0.5s">
                                <img src="<?php echo esc_url($breadcrumb_img); ?>" alt="">
                            </div>
                            <div class="sw_bredcrumb_left col-12 col-md-6">
                                <div class="sw-about-contain">
                                    <h1 class="sw--fs-27 sw--color-black-900 ">
                                        <?php
                                        echo esc_html($breadcrumb_custom_title);
                                        ?>
                                    </h1>
                                </div>
                            </div>
                            <div class="sw_bredcrumb_right col-12 col-md-6">
                                <div>
                                    <?php bissful_breadcrumbs(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Bredcrumb End -->
            <?php
        
    }
}

#-----------------------------------------------------------------#
# Title Trim
#-----------------------------------------------------------------#/
function bissful_title_trim($maxchar = 90) {

    $fullTitle = get_the_title();

    // get the length of the title
    $titleLength = strlen($fullTitle);

    if ($maxchar > $titleLength) {
        return $fullTitle;
    } else {
        $shortTitle = substr($fullTitle, 0, $maxchar);
        return $shortTitle . " &hellip;";
    }
}

#-----------------------------------------------------------------#
# Social Share
#-----------------------------------------------------------------#/
if (!function_exists('bissful_single_blog_social_share')) :
    function bissful_single_blog_social_share() {

        $dmsocialURL = urlencode(get_permalink());

        // Get current page title
        $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u=' . $dmsocialURL;
        $googleURL = 'https://plus.google.com/share?url=' . $dmsocialURL;
        $bufferURL = 'https://bufferapp.com/add?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
        $whatsappURL = 'whatsapp://send?text=' . $dmsocialTitle . ' ' . $dmsocialURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url=' . $dmsocialURL . '&amp;title=' . $dmsocialTitle;

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url=' . $dmsocialURL . '&amp;description=' . $dmsocialTitle;


        echo '<li class="nb-btna-hbr"><a href="' . $facebookURL . '" target="_blank" class="nl-fs-24 nl-color-brown border-1 nl-border-radius-5 nl-button-hover overflow-hidden pl-25 pr-25 facebook "><i class="nl-icon nl-icon-facebook"></i></a></li>';
        echo '<li class="nb-btna-hbr"><a href="' . $twitterURL . '" target="_blank" class="nl-fs-24 nl-color-brown border-1 nl-border-radius-5 nl-button-hover overflow-hidden pl-25 pr-25 twitter"><i class="nl-icon nl-icon-x-twitter"></i></a></li>';
        echo '<li class="nb-btna-hbr"><a href="' . $linkedInURL . '" target="_blank" class="nl-fs-24 nl-color-brown border-1 nl-border-radius-5 nl-button-hover overflow-hidden pl-25 pr-25 linkedin"><i class="nl-icon nl-icon-instagram"></i></a></li>';


    }

    ;
endif;

/*
 ***** Get Only First Category
 */
if (!function_exists('teconce_get_first_category')) :

    function teconce_get_first_category() {
        // Get the categories for the current post
        $categories = get_the_category();

        // Check if there are categories associated with the post
        if (!empty($categories)) {
            // Get the first category from the array
            $first_category = $categories[0];

            // Output the name and link of the first category
            echo '<a href="' . esc_url(get_category_link($first_category->term_id)) . '">' . esc_html($first_category->name) . '</a>';
        }
    }
endif;


if(!function_exists('bissful__wp_kses')):
	/**
	 * Allow basic tags
	 *
	 * @since 1.0.0
	 **/
	function bissful__wp_kses($string = '')
	{
		return wp_kses($string, [
			'a' => [
				'class' => [],
				'href' => [],
				'target' => []
			],
			'code' => [
				'class' => []
			],
			'strong' => [],
			'br' => [],
			'em' => [],
			'p' => [
				'class' => []
			],
			'span' => [
				'class' => []
			],
		]);
	}
endif;


if(!function_exists('bissful__implode_html_attributes')):
	/**
	 * Implode and escape HTML attributes for output.
	 *
	 * @since 1.9.4
	 * @param array $raw_attributes Attribute name value pairs.
	 * @return string
	 */
	function bissful__implode_html_attributes( $raw_attributes ) {

		$rendered_attributes = [];

		foreach ( $raw_attributes as $attribute_key => $attribute_values ) {
			if ( is_array( $attribute_values ) ) {
				$attribute_values = implode( ' ', $attribute_values );
			}

			$rendered_attributes[] = sprintf( '%1$s="%2$s"', $attribute_key, esc_attr( $attribute_values ) );
		}

		return implode( ' ', $rendered_attributes );
	}
endif;


if(!function_exists('bissful__valid_url')):
	/**
	 * Checks for valid 200 response code
	 *
	 * @since 2.4.0
	 **/
	function bissful__valid_url($url)
	{

		$response = wp_safe_remote_get( $url );

		if ( is_wp_error( $response ) ) {
			return false;
		}

		return 200 === wp_remote_retrieve_response_code( $response );
	}
endif;




