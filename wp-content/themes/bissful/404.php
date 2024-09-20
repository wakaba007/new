<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Bissful
 */

get_header();
bissful_breadcrumb_markup();
?>

	<main id="primary" class="site-main">

		<section class="error-404 not-found">
            <div class="nestbyte-error-404 not-found container">
                <div class="row row align-items-center">


                    <div class="page-header nestbyte-404-header col-12 col-md-6">
                        <img src="https://nestland.themepreview.xyz/home01/wp-content/themes/nestland/assets/images/404.svg" alt="404">

                    </div><!-- .page-header -->

                    <div class="page-content col-12 col-md-6">
                        <h1 class="page-title">Oops! That page can’t be found.</h1>
                        <p>It looks like nothing was found at this location. Maybe try one of the links below or a search?</p>
                    </div><!-- .page-content -->
                </div>
            </div>
		</section><!-- .error-404 -->

	</main><!-- #main -->

<?php
get_footer();
