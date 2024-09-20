<?php
/**
 * Template part for displaying posts single
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Bissful
 */
?>


    <!-- Single  -->
    <section class="pt-120 sw__blog-single-section single-post-block">
        <div class="container container-1290">
            <div class="row">
                <div class="col-12">
                 
                    <?php if (has_post_thumbnail()) { ?>
                        <div class="sw_blog-banner">
                            <img src="<?php the_post_thumbnail_url(); ?>" alt="Blog-banner.png">
                        </div>
                    <?php } ?>
                    <div class="mb-30 sw__blog-single-meta">

                        <ul class="sw_blog-business-button-ul">
                            
                            <li>

                           <i class="far fa-folder"></i>
                    <?php
                    if (get_the_category_list()) {
                        teconce_get_first_category();
                    }
                    ?>
                    </li>
                            <li>
                                <i class="far fa-calendar"></i>
                                <p class="sw--fs-16 sw--color-black-800">
                                    <?php echo get_the_date("F j, Y"); ?>
                                </p>
                            </li>
                            <?php if (class_exists("Teconce_Core")) { ?>
                                <li class="d-flex gap-2">
                                    <?php
                                    $like_text = '';
                                    if (is_single()) {
                                        $nonce = wp_create_nonce('pt_like_it_nonce');
                                        $link = admin_url('admin-ajax.php?action=pt_like_it&post_id=' . $post->ID . '&nonce=' . $nonce);
                                        $likes = get_post_meta(get_the_ID(), '_pt_likes', true);
                                        $likes = (empty($likes)) ? 0 : $likes;
                                        $like_text = '<div class="pt-like-it">
                                                        <a class="like-button" href="' . $link . '" data-id="' . get_the_ID() . '" data-nonce="' . $nonce . '">
                                                            <span id="like-count-' . get_the_ID() . '" class="like-count">' . $likes . ' Likes</span>
                                                        </a>
                                                        
                                                    </div>';
                                        echo wp_kses_post($like_text);
                                    }
                                    ?>
                                </li>
                            <?php } ?>
                            <li class="d-flex gap-2 wd__single-comment-count">

                                <p class="sw--fs-16 sw--color-black-800">
                                    <?php
                                    if (0 < get_comments_number()) {
                                        echo get_comments_number() . ' comments';
                                    } else {
                                        echo 0 . ' comment';
                                    }
                                    ?>
                                </p>
                            </li>
                        </ul>
                    </div>
                    <div class="wd__blog-single-content single-entry-content">
                        <?php the_content(); ?>
                        
                        
                        
                        
                            <?php
                            $tag_list = get_the_tag_list();
                            if ($tag_list && !is_wp_error($tag_list)) {
                                ?>
                                <div class="sw_blog-tags">
                                    <h3><?php esc_html_e('Tags : ','bissful');?></h3>
                                    <?php echo wp_kses_post($tag_list); ?>
                                </div>
                                <?php
                            }
                            ?>
                  
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Single -->

    <section class="wd__comment-template mb-80">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </section>

<?php
// Get the current post's categories
$categories = get_the_category();
$category_ids = array();
foreach ($categories as $category) {
    $category_ids[] = $category->term_id;
}

// Query related posts
$related_posts_args = array(
    'post__not_in' => array($post->ID), // Exclude current post
    'category__in' => $category_ids, // Only include posts from shared categories
    'posts_per_page' => 2, // Number of related posts to display
    'orderby' => 'rand', // Order by random (you can change this to 'date', 'title', etc.)
);
$related_posts_query = new WP_Query($related_posts_args);

// Display related posts
if ($related_posts_query->have_posts()) {
    ?>
    <!-- Related Post Start -->
    <div class="sw__related-blog mb-120">
        <div class="container">
            <div class="row g-30">
                <?php
                while ($related_posts_query->have_posts()) {
                    $related_posts_query->the_post();
                    $author_id = get_the_author_meta('ID');
                    ?>
                    <div class="col-md-6">
                          <?php if(has_post_thumbnail()) { ?>
    <div class="sw__blogv2-card sw__blogv3-card wow fadeInUp overflow-hidden" data-wow-delay="0.3s">
        
        <?php } else { ?>
         <div class="sw__blogv3-card-wth-thumb sw__blogv2-card sw__blogv3-card wow fadeInUp overflow-hidden" data-wow-delay="0.3s">
        <?php } ?>
        
                            <?php if (has_post_thumbnail()) { ?>
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
                                        <a href="<?php echo esc_url(get_author_posts_url($author_id)); ?>" class="sw--fs-14 sw--color-black-900 "><?php _e('By ', 'bissful'); ?><?php echo get_the_author_meta('display_name') ?></a>
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
                    <?php
                }
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
    <!-- Related Post End -->
    <?php
}
?>