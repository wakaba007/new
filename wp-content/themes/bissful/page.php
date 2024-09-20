<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bissful
 */

get_header();
$arcive_img = cs_get_option('nl_bredcrumb_bg_image');
$arcive_card_img = is_array($arcive_img) && !empty($arcive_img['url']) ? $arcive_img['url'] : '';
$page_meta = get_post_meta(get_the_ID(), 'teconce_page_options', true);
$page_width = (!empty($page_meta['page_width'])) ? $page_meta['page_width'] : 'container';

?>
<?php
if (class_exists( 'Teconce_Core' )) {
    if (!is_front_page()){
        bissful_breadcrumb_markup();
    }
} else {
    bissful_breadcrumb_markup_alt();
}
?>

    <main id="primary" class="site-main bs_def_page_box">
        <div class="<?php echo esc_attr($page_width); ?>">

            <?php
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content', 'page');

                // If comments are open or we have at least one comment, load up the comment template.
                if (comments_open() || get_comments_number()) :
                    comments_template();
                endif;

            endwhile; // End of the loop.
            ?>
        </div>

    </main><!-- #main -->

<?php
get_footer();
