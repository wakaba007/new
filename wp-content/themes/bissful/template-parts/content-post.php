<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bissful
 */

$author_id = get_the_author_meta('ID');

?>

<div class="col-md-6">
     <?php if(has_post_thumbnail()) { ?>
    <div class="sw__blogv2-card sw__blogv3-card wow fadeInUp overflow-hidden" data-wow-delay="0.3s">
        
        <?php } else { ?>
         <div class="sw__blogv3-card-wth-thumb sw__blogv2-card sw__blogv3-card wow fadeInUp overflow-hidden" data-wow-delay="0.3s">
        <?php } ?>
        
        
        <?php if (is_sticky()){?>
         <span class="sw_sticky_post"><?php esc_html_e('Featured','bissful');?></span>
        <?php } ?>
        <?php if(has_post_thumbnail()) { ?>
        <div class="sw__blogv2-card-img sw__blogv3-card-img position-relative sw__shine_animation">
            <a href="<?php the_permalink(); ?>">
                <img src="<?php echo esc_url(get_the_post_thumbnail_url()); ?>" alt="">
            </a>
            <div class="sw__blogv2-card-date sw__blogv3-card-date wow fadeInUp" data-wow-delay="0.5s">
                <?php echo get_the_date('d M'); ?>
            </div>
        </div>
        <?php } ?>
        <div class="sw__blogv2-card-content sw__blogv3-card-content wow fadeInUp" data-wow-delay="0.6s">
            <div class="sw__blogv3-card-cat-author d-flex align-items-center gap-2 pt-25 pb-25">
                <div class="sw__blogv3-card-cat-author-item d-flex align-items-center gap-2 sw__v3-blog-category">
                    <i class="sw-icon sw-icon-file-manager sw--color-brown sw--fs-14"></i>
                    <?php
                    if (get_the_category_list()) {
                        teconce_get_first_category();
                    }
                    ?>
                </div>
                <div class="sw__blogv3-card-cat-author-item d-flex align-items-center gap-2">
                    <i class="sw-icon sw-icon-user sw--color-brown sw--fs-14"></i>
                    <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="sw--fs-14 sw--color-black-900 "><?php _e('By', 'bissful'); ?> <?php echo get_the_author_meta('display_name') ?></a>
                </div>
            </div>
            <h6 class="sw__blogv2-sub-title ">
                <a class="sw--fs-27 sw--color-black-900 " href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
            </h6>
            <div class="sw__button sw__button-v3 mt-40">
                <a href="<?php the_permalink(); ?>"><?php _e("Read More", "bissful"); ?></a>
            </div>
        </div>
    </div>
</div>
