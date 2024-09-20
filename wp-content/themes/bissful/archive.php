<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bissful
 */

get_header();

if (is_active_sidebar('sidebar-1')) {
    $blog_column = 'col-12 col-lg-8';
    $sidebar_column = 'col-12 col-lg-4';
} else {
    $blog_column = 'col-12';
    $sidebar_column = '';
}
?>


<?php bissful_breadcrumb_markup(); ?>

    <section class="sw__blogv2 position-relative pt-120 pb-120">
        <div class="sw__blogv2-wrapper position-relative">
            <div class="container container-1290 position-relative">
                <div class="row g-30 mt-none-30">
					<?php
					if (have_posts()) :
						/* Start the Loop */
						while (have_posts()) :
							the_post();
							get_template_part('template-parts/content', 'post');
						endwhile;
					else :
						get_template_part('template-parts/content', 'none');
					endif;
					bissful_page_navs();
					?>
                </div>
            </div>
        </div>
    </section>


<?php

get_footer();
