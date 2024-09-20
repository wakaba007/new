<?php
/**
 * Theme Breadcrumbs
 *
 *  @package mayosis
 */
/**
 * Breadcrumbs
 *
 * Echoes the current breadcrumbs. Supports EDD built in taxs.
 *
 * @return   string
 * @access   private
 * @since    1.0
 */
if ( ! function_exists( 'bissful_breadcrumbs' ) ) {
	function bissful_breadcrumbs() {
		global $wp_query, $post, $paged;
		$space      = ' ';
		$on_front   = get_option( 'show_on_front' );
		$blog_page  = get_option( 'page_for_posts' );
		$separator  = $space . '' . $space;
		$link       = apply_filters( 'dm_breadcrumb_link', '<li><a href="%1$s" title="%2$s" rel="bookmark" class="breadcrumb-item">%2$s</a></li>' );
		$current    = apply_filters( 'dm_breadcrumb_current', '<li><span class="active">%s</span></li>' );
		if ( ( $on_front == 'page' && is_front_page() ) || ( $on_front == 'posts' && is_home() ) ) {
			return;
		}
		$out = '<ul class="breadcrumb">';
		if ( $on_front == "page" && is_home() ) {
			$blog_title = isset( $blog_page ) ? get_the_title( $blog_page ) : __( 'Our Blog', 'bissful' );
			$out .= sprintf( $link, home_url(), __( 'Home', 'bissful' ) ) . $separator . sprintf( $current, $blog_title );
		} else {
			$out .= sprintf( $link, home_url(), __( 'Home', 'bissful' ) );
		}
		if ( is_singular() ) {
			if ( is_singular( 'post' ) && $blog_page > 0 ) {
				$out .= $separator . sprintf( $link, get_permalink( $blog_page ), esc_attr( get_the_title( $blog_page ) ) );
			}
			if ( $post->post_parent > 0 ) {
				if ( isset( $post->ancestors ) ) {
					if ( is_array( $post->ancestors ) )
						$ancestors = array_values( $post->ancestors );
					else
						$ancestors = array( $post->ancestors );
				} else {
					$ancestors = array( $post->post_parent );
				}
				foreach ( array_reverse( $ancestors ) as $key => $value ) {
					$out .= $separator . sprintf( $link, get_permalink( $value ), esc_attr( get_the_title( $value ) ) );
				}
			}
			$post_type = get_post_type();
			if ( get_post_type_archive_link( $post_type ) ) {
				$post_type_obj = get_post_type_object( $post_type );
				$out .= $separator . sprintf( $link, get_post_type_archive_link( $post_type ), esc_attr( $post_type_obj->labels->menu_name ) );
			}
			$out .= $separator . sprintf( $current, get_the_title() );
		} else {
			if ( is_post_type_archive() ) {
//                $post_type = get_post_type();
				$post_type = post_type_archive_title('', false);
				$post_type_obj = get_post_type_object( $post_type );
				$out .= $separator . sprintf( $current, $post_type_obj->labels->menu_name );
			} else if ( is_tax() ) {
				if ( is_tax( 'download_tag' ) || is_tax( 'download_category' ) ) {
					$post_type = get_post_type();
					$post_type_obj = get_post_type_object( $post_type );
					$out .= $separator . sprintf( $link, get_post_type_archive_link( $post_type ), esc_attr( $post_type_obj->labels->menu_name ) );
				}
				$out .= $separator . sprintf( $current, $wp_query->queried_object->name );
			} else if ( is_category() ) {
				$out .= $separator . __( '<li><span>Category</span></li>', 'bissful' ) . sprintf( $current, $wp_query->queried_object->name );
			} else if ( is_tag() ) {
				$out .= $separator . __( '<li><span>Tag</span></li>', 'bissful' ) . sprintf( $current, $wp_query->queried_object->name );

			} else if ( is_author() ) {

				$out .= $separator . __( '<li><span>Author</span></li>', 'bissful' );
			} else if ( is_date() ) {
				$out .= $separator;
				if ( is_day() ) {
					global $wp_locale;
					$out .=  __( '<span>Day</span>','bissful');
					$out .= $separator . sprintf( $current, get_the_date() );
				} else if ( is_month() ) {
					$out .= sprintf( $current, single_month_title( ' ', false ) );
				} else if ( is_year() ) {
					$out .= sprintf( $current, get_query_var( 'year' ) );
				}
			} else if ( is_404() ) {
				$out .= $separator . sprintf( $current, __( 'Error 404', 'bissful' ) );
			} elseif ( is_search() ) {
				if (have_posts()) {
					if ($show_home_link && $show_current) echo  '<span class="sep">' . $sep . '</span>';
					if ($show_current) echo '<span>' . $before . '</span>'. sprintf($text['search'], get_search_query()) . $after;
				} else {
					if ($show_home_link) echo '<span class="sep">' . $sep . '</span>';
					echo '<span>' . $before . '</span>'. sprintf($text['search'], get_search_query()) . $after;
				}
			}
		}
		$out .= '</ul>';
		echo apply_filters( 'bissful_breadcrumbs_out', $out );
	}
}
// Hooks into the Digital Store theme
add_action( 'bissful_before_template_header', 'bissful_breadcrumbs' );