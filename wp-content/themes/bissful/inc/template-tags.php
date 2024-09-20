<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Bissful
 */

if ( ! function_exists( 'bissful_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
    function bissful_posted_on()
    {
        $time_string = '<time class="post-date published updated" datetime="%1$s">%2$s</time>';
        if (get_the_time('U') !== get_the_modified_time('U')) {
            $time_string = '<time class="updated" datetime="%3$s">%4$s</time> <time class="post-date published" datetime="%1$s">%2$s</time>';
        }

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date()),
            esc_attr(get_the_modified_date(DATE_W3C)),
            esc_html(get_the_modified_date())
        );

        $posted_on = sprintf(
        /* translators: %s: post date. */
            esc_html_x('%s', 'post date', 'bissful'),
            '<a class="nl-fs-18 nl-color-black nl-lh-26 nl-font-heading" href="' . esc_url(get_day_link(get_post_time('Y'), get_post_time('m'), get_post_time('j'))) . '" rel="bookmark">' . $time_string . '</a>'
        );

        echo '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

    }
endif;

if ( ! function_exists( 'bissful_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function bissful_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'By %s', 'post author', 'bissful' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}
endif;

if ( ! function_exists( 'bissful_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function bissful_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'bissful' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Posted in %1$s', 'bissful' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'bissful' ) );
			if ( $tags_list ) {
				/* translators: 1: list of tags. */
				printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'bissful' ) . '</span>', $tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}
		}

		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'bissful' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			echo '</span>';
		}

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'bissful' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'bissful_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function bissful_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>

			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : ?>
				<?php
					the_post_thumbnail(
						'post-thumbnail',
						array(
							'alt' => the_title_attribute(
								array(
									'echo' => false,
								)
							),
						)
					);
				?>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	/**
	 * Shim for sites older than 5.2.
	 *
	 * @link https://core.trac.wordpress.org/ticket/12563
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;

//	Date Arcive Post
add_filter ('get_archives_link',
    function ($link_html, $url, $text, $format, $before, $after) {
        if ('with_plus' == $format) {
            $link_html = "<li class='CAPS source-bold'><a href='$url'>"
                . "<span class='plus'>+</span> Trip $text"
                . '</a></li>';
        }
        return $link_html;
    }, 10, 6);

/**
 * Catagories 
 */
if ( ! function_exists( 'nestbute_post_cat' ) ) :
    /**
     * Prints HTML with meta information for the categories.
     */
    function nestbute_post_cat() {
        // Hide category and tag text for pages.
        if ( 'post' === get_post_type() ) {
            /* translators: used between list items, there is a space after the comma */
            $categories_list = get_the_category_list(', ', esc_html__( ' ', 'bissful' ) );
            if ( $categories_list ) {
                /* translators: 1: list of categories. */
                printf( '<span class="nb_animation_text_link nb-f16 nb-fw4 nb-bcl nb-ffb ">' . esc_html__( '%1$s', 'bissful' ) . '</span>', $categories_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
            }
        }
    }
endif;

if ( ! function_exists( 'nestbute_post_cat_singl' ) ) :
    function nestbute_post_cat_singl(){
        foreach ((get_the_category()) as $category) {
            $postcat = $category->cat_ID;
            $catname = $category->cat_name;
            ?>
            <a href="<?php echo esc_url(get_term_link($postcat)) ?>" class="nb_animation_text_link nb-f16 nb-fw4 nb-bcl nb-ffb "
                  data-replace="<?php echo esc_attr($catname); ?>"> <?php echo esc_html($catname); ?> <span
                        class="last-cat">,</span></a>
            <?php
        }
    }
endif;
if ( ! function_exists( 'nestbute_post_tag' ) ) :
    /**
     * Prints HTML with meta information for thtags.
     */
    function nestbute_post_tag() {
        ?>

                <?php
                // Get the taxonomy's terms
                $terms = get_terms(
                    array(
                        'taxonomy' => 'post_tag',
                        'hide_empty' => true,
                    )
                );
                // Check if any term exists

                ?>
        <ul class="nb-Category-link-ul-1">
            <?php
            if (!empty($terms) && is_array($terms)) {
                // Run a loop and print them all
                foreach ($terms as $term) {
                    ?>
                    <li>
                        <a class="nb-Category-link-a" href="<?php echo esc_url(get_term_link($term)) ?>">
                            <?php echo esc_html($term->name); ?>
                        </a>
                    </li>
                    <?php
                }
            }
            ?>
        </ul>
<?php
    }
endif;


/**
 * Comment Function
 */
