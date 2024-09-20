<?php
/**
 * Shop category filter button template
 *
 * @package pivoo
 */

$layout = get_theme_mod( 'category_sidebar', 'left-sidebar' );
if ( 'none' === $layout || get_theme_mod( 'html_shop_page_content' ) ) {
    return;
}

$after = 'data-visible-after="true"';
$class = 'show-for-medium';

$custom_filter_text = get_theme_mod( 'category_filter_text' );
$filter_text = $custom_filter_text ? $custom_filter_text : __( 'Filter', 'bissful' );
?>
<div class="category-filtering category-filter-row <?php echo maybe_unserialize($class) ?>">
    <a href="#" data-open="#shop-sidebar" <?php echo maybe_unserialize($after) ?> data-pos="left" class="filter-button uppercase plain">
        <i class="icon-menu"></i>
        <strong><?php echo maybe_unserialize($filter_text)?></strong>
    </a>
    <div class="inline-block">
        <?php the_widget( 'WC_Widget_Layered_Nav_Filters' ) ?>
    </div>
</div>
