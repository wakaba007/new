<?php
if ( ! function_exists( 'bissful_post_style_list_sidebar' ) ) {
    function bissful_post_style_list_sidebar() { ?>
        <div class="nlv2_footer-blog-post pb-30">
            <p class="nl-fs-14 nl-lh-24 nl-color-white-opacity nl-color-white-opacity nl-font-body">
                <?php bissful_posted_on(); ?></p>
            <a href="#"
               class="nl-fs-18 nl-lh-24 nl-color-white-opacity nl-color-white-opacity nl-font-heading pt-1"><?php echo bissful_title_trim($maxchar= 38); ?></a>
        </div>
    <?php } }