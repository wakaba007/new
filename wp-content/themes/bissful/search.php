<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package Bissful
 */

get_header();
$arcive_img = cs_get_option('nl_bredcrumb_bg_image');
$arcive_card_img = is_array($arcive_img) && !empty($arcive_img['url']) ? $arcive_img['url'] : '';

$bissful_blog_grid_style = cs_get_option('bissful_blog_grid_style');
?>
    <!--breadcrumb section start-->
    <!-- About Bredcrumb Start -->
    <section class="nb_bredcrumb nb-bg1">
        <div class="nb_bredcrumb_wrapper"
             style="background-image: linear-gradient(rgb(0 0 0 / 50%), rgb(0 0 0 / 50%)), <?php if (!empty($arcive_img)) { ?> url( <?php echo esc_url($arcive_card_img); ?> ) <?php } else { ?> url( <?php  echo get_template_directory_uri() ?>/assets/images/bredcrumb.png ) ;  <?php } ?> ">
            <div class="container">
                <div class="nb_bredcrumb_wrapper_container nb-dw justify-content-between">
                    <div class="nb_bredcrumb_left">
                        <div class="nb-about-contain">
                            <h4 class="mb_name nb-f32 nb-fw7 nb-wcl nb-ffh">
                                <?php
                                if (have_posts()) {

                                    ?>
                                    <?php
                                        /* translators: %s: search query. */
                                        printf(esc_html__('Search Results for: %s', 'bissful'), '<span>' . get_search_query() . '</span>');
                                        ?>
                                <?php } else { ?>
                                    <?php esc_html_e('Nothing Found', 'bissful'); ?>
                                <?php } ?>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section Start-->

    <!--breadcrumb section end-->
    <!-- Blog section Start-->
    <section class="nbv2_blog nb-bg1 pt-150 pb-150 nb-malls nb__mobile-pt-100 nb__mobile-pb-100">
        <div class="nbv2_blog_wrapper">
            <div class="container">
                <div class="nbv2_blog_wrapper_container">
                    <div class="row">
                        <div class="col-12 col-xl-12 mx-auto">
                            <div class="row">


                            <?php
                            if (have_posts()) :
                                /* Start the Loop */
                                while (have_posts()) :
                                    the_post();
                                    /*
                                     * Include the Post-Type-specific template for the content.
                                     * If you want to override this in a child theme, then include a file
                                     * called content-___.php (where ___ is the Post Type name) and that will be used instead.
                                     */
                                    ?>
                                    <div class="col-12 col-lg-12 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                        <?php  get_template_part('template-parts/content', 'post'); ?>
                                    </div>
                                <?php

                                endwhile;
                            else :
                                ?>
                                <div class="col-12 col-lg-12 col-xl-6 col-xxl-6 col-md-12 col-sm-12">
                                    <?php   get_template_part('template-parts/content', 'none'); ?>
                                </div>
                            <?php
                            endif;
                            bissful_page_navs();
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog section End-->

<?php
get_footer();
