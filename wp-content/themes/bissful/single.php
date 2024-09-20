<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Bissful
 */

get_header();

bissful_breadcrumb_markup();

?>

    <div class="bissful-single-post">
        <?php
        while (have_posts()) :
            the_post();
            get_template_part('template-parts/content', 'single-post');

        endwhile; // End of the loop.
        wp_reset_postdata();
        ?>
    </div>
<?php
get_footer();
