<?php
if ( ! function_exists( 'bissful_comments' ) ) :
    function bissful_comments( $comment, $args, $depth ) {
        $GLOBALS['comment'] = $comment;

        if ( 'pingback' == $comment->comment_type || 'trackback' == $comment->comment_type ) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
            <div class="comment-body">
                <?php esc_html_e( 'Pingback:', 'bissful' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_attr__( 'Edit', 'bissful' ), '<span class="edit-link">', '</span>' ); ?>
            </div>
            </li>
        <?php else : ?>
            <ul class="nb-comment-area-ul">
                <li id="comment-<?php comment_ID(); ?>" <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?>>
                    <div class="nb-comment-contain-img align-self-center">
                        <?php echo get_avatar( $comment, 104); ?>
                    </div>

                    <div class="nb-comment-contain">
                        <h4 class="nb-f18 nb-fw7 nb-wcl nb-ffh">
                            <?php printf( esc_html__( '%s', 'bissful' ), sprintf( '<h3 class="comment-author-title nb-f18 nb-fw7 nb-wcl nb-ffh">%s</h3>', get_comment_author_link() ) ); ?>
                        </h4>

                        <p class="nb-f16 nb-fw4 nb-bcl nb-ffb">
                            <?php comment_text(); ?>
                        </p>

                        <div class="d-flex gap-3">
                            <p>
                                <a class="fw-light fs-sm text-color nb-f14 nb-fw4 nb-wcl nb-ffb" href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
                                    <time datetime="<?php comment_time( 'c' ); ?>">
                                        <?php printf( esc_html__( '%1$s at %2$s', 'bissful' ), get_comment_date(), get_comment_time() ); ?>
                                    </time>
                                </a>
                            </p>
                            <?php
                            comment_reply_link( array_merge( $args, array(
                                'add_below' => 'div-comment',
                                'depth'     => $depth,
                                'max_depth' => $args['max_depth'],
                                'before'    => '<span class="nb_animation_text_link nb-mcl nb-f16 nb-fw7 nb-ffh">',
                                'after'     => '</span>',
                            ) ) );
                            ?>
                        </div>
                    </div>
                </li>
            </ul>

            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body blog-comment-list">

            </article>
        <?php
        endif;
    }
endif; // ends check for bissful_comments()