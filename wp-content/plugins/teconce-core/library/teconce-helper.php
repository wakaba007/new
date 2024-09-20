<?php
/* Compress CSS */
if ( ! function_exists( 'teconce_compress_css_lines' ) ) {
  function teconce_compress_css_lines( $css ) {
    $css  = preg_replace( '!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css );
    $css  = str_replace( ': ', ':', $css );
    $css  = str_replace( array( "\r\n", "\r", "\n", "\t", '  ', '    ', '    ' ), '', $css );
    return $css;
  }
}

/* Inline Style */
global $all_inline_styles;
$all_inline_styles = array();
if( ! function_exists( 'add_inline_style' ) ) {
  function add_inline_style( $style ) {
    global $all_inline_styles;
    array_push( $all_inline_styles, $style );
  }
}

/* Support WordPress uploader to following file extensions */
if( ! function_exists( 'teconce_upload_mimes' ) ) {
  function teconce_upload_mimes( $mimes ) {

    $mimes['ttf']   = 'font/ttf';
    $mimes['eot']   = 'font/eot';
    $mimes['svg']   = 'font/svg';
    $mimes['woff']  = 'font/woff';
    $mimes['otf']   = 'font/otf';

    return $mimes;

  }
  add_filter( 'upload_mimes', 'teconce_upload_mimes' );
}
#-----------------------------------------------------------------#
# RGB to HEX Converter
#-----------------------------------------------------------------#/

if ( ! function_exists( 'teconce_rgb_to_hex' ) ) :
function teconce_rgb_to_hex( $color ) {

	$pattern = "/(\d{1,3})\,?\s?(\d{1,3})\,?\s?(\d{1,3})/";

	// Only if it's RGB
	if ( preg_match( $pattern, $color, $matches ) ) {
	  $r = $matches[1];
	  $g = $matches[2];
	  $b = $matches[3];

	  $color = sprintf("#%02x%02x%02x", $r, $g, $b);
	}

	return $color;
}
endif;

#-----------------------------------------------------------------#
# HEX to RGB Converter
#-----------------------------------------------------------------#/

function teconce_hexto_rgb($color, $opacity = false) {

    $default = 'rgb(0,0,0)';

    //Return default if no color provided
    if(empty($color))
        return $default;

    //Sanitize $color if "#" is provided
    if ($color[0] == '#' ) {
        $color = substr( $color, 1 );
    }

    //Check if color has 6 or 3 characters and get values
    if (strlen($color) == 6) {
        $hex = array( $color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5] );
    } elseif ( strlen( $color ) == 3 ) {
        $hex = array( $color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2] );
    } else {
        return $default;
    }

    $rgb =  array_map('hexdec', $hex);

    //Check if opacity is set(rgba or rgb)
    if($opacity){
        if(abs($opacity) > 1)
            $opacity = 1.0;
        $output = 'rgba('.implode(",",$rgb).','.$opacity.')';
    } else {
        $output = 'rgb('.implode(",",$rgb).')';
    }

    //Return rgb(a) color string
    return $output;
}

if ( ! function_exists( 'teconce_single_blog_social' ) ) :
    function teconce_single_blog_social() {

        $dmsocialURL = urlencode(get_permalink());

        // Get current page title
        $dmsocialTitle = urlencode(html_entity_decode(get_the_title(), ENT_COMPAT, 'UTF-8'));


        // Construct sharing URL without using any script
        $twitterURL = 'https://twitter.com/share?url=' . $dmsocialURL . '&amp;text=' . $dmsocialTitle;
        $facebookURL = 'https://www.facebook.com/sharer/sharer.php?u='.$dmsocialURL;
        $googleURL = 'https://plus.google.com/share?url='.$dmsocialURL;
        $bufferURL = 'https://bufferapp.com/add?url='.$dmsocialURL.'&amp;text='.$dmsocialTitle;
        $whatsappURL = 'whatsapp://send?text='.$dmsocialTitle . ' ' . $dmsocialURL;
        $linkedInURL = 'https://www.linkedin.com/shareArticle?mini=true&url='.$dmsocialURL.'&amp;title='.$dmsocialTitle;

        // Based on popular demand added Pinterest too
        $pinterestURL = 'https://pinterest.com/pin/create/button/?url='.$dmsocialURL.'&amp;description='.$dmsocialTitle;

        echo '<ul class="teconce-single-social-button">';
        echo '<li><a href="'.$facebookURL.'" target="_blank" class="social-share facebook"><i class="ri-facebook-fill"></i></a></li>';
        echo '<li><a href="'.$twitterURL.'" target="_blank" class="social-share twitter"><i class="ri-twitter-fill"></i></a></li>';
        echo '<li><a href="'.$pinterestURL.'" target="_blank" class="social-share pinterest"><i class="ri-pinterest-fill"></i></a></li>';
        echo '<li><a href="'.$linkedInURL.'" target="_blank" class="social-share linkedin"><i class="ri-linkedin-fill"></i></a></li>';
        echo'</ul>';


    };
endif;


if ( ! function_exists( 'teconce_single_blog_social_popup' ) ) :
    function teconce_single_blog_social_popup() {
?>

        <?php
?>
        <ul class="teconce-single-social-button">
            <li  class="social-share facebook" > <i class="ri-facebook-fill"></i> </li>
            <li class="social-share twitter"><i class="ri-twitter-fill"></i></li>
            <li class="social-share pinterest"><i class="ri-pinterest-fill"></i></li>
            <li class="social-share linkedin"><i class="ri-linkedin-fill"></i></li>
                    </ul>
<?php
    };
endif;


// Create Shortcode delivery_date
// Shortcode: [delivery_date day="3"]
function create_deliverydate_shortcode($atts) {

    $atts = shortcode_atts(
        array(
            'day' => '3',
        ),
        $atts,
        'delivery_date'
    );

    $day = $atts['day'];

    $output = date('j F, l',strtotime("+$day days"));;
    return $output;

}
add_shortcode( 'delivery_date', 'create_deliverydate_shortcode' );

/*
 * Custom CSF Icon
 */
if( ! function_exists( 'teconce_csf_custom_icons' ) ) {

    function teconce_csf_custom_icons( $icons ) {

        //
        // Use this for reset current icons
        // $icons = array();

        //
        // Adding new icons
        $icons[]  = array(
            'title' => 'Teconce Custom Icons',
            'icons' => array(
                'sw-icon sw-icon-call-fill',
                'sw-icon sw-icon-email',
                'sw-icon sw-icon-linkedin',
                'sw-icon sw-icon-pinterest',
                'sw-icon sw-icon-pluse',
                'sw-icon sw-icon-watch',
                'sw-icon sw-icon--15',
                'sw-icon sw-icon-arrow-right-short-2',
                'sw-icon sw-icon-file-manager',
                'sw-icon sw-icon-file-manager',
                'sw-icon sw-icon-arrow-single-right',
                'sw-icon sw-icon-arrow-double-right',
                'sw-icon sw-icon-award',
                'sw-icon sw-icon-twitter',
                'sw-icon sw-icon-play',
                'sw-icon sw-icon-call',
                'sw-icon sw-icon-cupol',
                'sw-icon sw-icon-glass',
                'sw-icon sw-icon-cack',
                'sw-icon sw-icon-correct',
                'sw-icon sw-icon-ceremony04',
                'sw-icon sw-icon-ceremony03',
                'sw-icon sw-icon-ceremony02',
                'sw-icon sw-icon-user',
                'sw-icon sw-icon-box-style',
                'sw-icon sw-icon-quotation-buttom',
                'sw-icon sw-icon-quotation-top',
                'sw-icon sw-icon-laf',
                'sw-icon sw-icon-arrow-unick-left',
                'sw-icon sw-icon-arrow-unick-right',
                'sw-icon sw-icon-arrow-unick-up',
                'sw-icon sw-icon-arrow-unick-down',
                'sw-icon sw-icon-arrow-right-log',
                'sw-icon sw-icon-arrow-right-short',
                'sw-icon sw-icon-ceremony01',
                'sw-icon sw-icon--icon-_search_',
                'sw-icon sw-icon--4',
                'sw-icon sw-icon-review',
                'sw-icon sw-icon-instragam',
                'sw-icon sw-icon-location',
            )
        );

        //
        // Move custom icons to top of the list.
        $icons = array_reverse( $icons );

        return $icons;

    }
    add_filter( 'csf_field_icon_add_icons', 'teconce_csf_custom_icons' );
}

/*
 ***** Get Custom Post type id
 */
function teconce_get_cpt_ids($post_type = '', $posts_per_page = 3, $order = 'DESC', $orderby = 'title') {
	$args = array(
		'post_type' => $post_type,
		'posts_per_page' => $posts_per_page,
		'order' => $order,
		'orderby' => $orderby,
	);

	$query = new WP_Query($args);
	$cpt_id = [];
	if ($query->have_posts()) {
		while ($query->have_posts()) {
			$query->the_post();
			$cpt_id[get_the_ID()] = get_the_title();
		}
		wp_reset_postdata();
	}
	return $cpt_id;
}

/*
 **** Get Blog Categories
 */
if ( ! function_exists( 'teconce_get_categories' ) ) {
	function teconce_get_categories(  $type = '', $query_args = array() ) {
		global $product;
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

if (!function_exists('teconce_get_all_post')){
	function teconce_get_all_post($post_type){
		$args = array(
			'numberposts' => -1,
			'post_type'   => $post_type
		);
		$posts = get_posts( $args );
		$list = array();
		foreach ($posts as $post){
			$list[$post->ID] = $post->post_title;
		}
		return $list;
	}
}



