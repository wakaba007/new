<?php

get_header();
$archive_subtitle          = ! empty( cs_get_option( 'archive_service_subtitle' ) ) ? cs_get_option( 'archive_service_subtitle' ) : '';
$archive_title             = ! empty( cs_get_option( 'archive_service_title' ) ) ? cs_get_option( 'archive_service_title' ) : '';
$archive_service_shape_img = ! empty( cs_get_option( 'archive_service_shape_img' ) ) ? cs_get_option( 'archive_service_shape_img' ) : '';


bissful_breadcrumb_markup();


?>
    <!-- Wedding service-->
    <section class="sw__service_counter pt-130 pb-100 sw--Bg-color-white position-relative">
		<?php
		if ( is_array( $archive_service_shape_img ) && ! empty( $archive_service_shape_img['url'] ) ) {
			?>
            <img src="<?php echo esc_url( $archive_service_shape_img['url'] ); ?>" alt="" class="sw__service_counter-shep sw__animation01 wow fadeInUp" data-wow-delay="0.2s">
		<?php } ?>
        <div class="sw__service-wrapper position-relative">
            <div class="container container-1290">
				<?php if ( ! empty( $archive_subtitle ) ) { ?>
                    <h6 class="sw__service-sub-title sw--fs-14 sw--color-brown  text-center wow fadeInUp" data-wow-delay="0.3s"><?php printf( __( '%s', 'bissful' ), $archive_subtitle ); ?></h6>
				<?php } ?>
				<?php if ( ! empty( $archive_title ) ) { ?>
                    <h2 class="sw__service-title sw--fs-50 sw--color-black-900  text-center wow fadeInUp" data-wow-delay="0.4s"><?php printf( __( '%s', 'bissful' ), $archive_title ); ?></h2>
				<?php } ?>
                <div class="sw__service-card pt-70">
                    <div class="row g-30">
						<?php
						$args  = array(
							'post_type'      => 'service',
							'posts_per_page' => 6,
							'orderby'        => 'title',
							'order'          => 'DESC',
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) {
							while ( $query->have_posts() ) {
								$query->the_post();
								$service_meta_icon        = get_post_meta( get_the_ID(), 'service_meta_icon', 'true' );
								$service_meta_button_text = get_post_meta( get_the_ID(), 'service_meta_button_text', 'true' );
								$btn_text                 = ! empty( $service_meta_button_text ) ? $service_meta_button_text : "See More";
								?>
                                <div class="col-lg-4 col-md-6">
                                    <div class="sw__service-box text-center sw--Bg-color-white sw--border-radius">
                                        <div class="sw__service-content sw__service-content-white pt-45 pb-45 pr-45 pl-45 sw--border-radius wow fadeInUp " data-wow-delay="0.2s">
											<?php if ( ! empty( $service_meta_icon ) ) { ?>
                                                <i class="<?php echo esc_attr( $service_meta_icon ); ?>"></i>
											<?php } ?>
                                            <h2 class="sw--fs-21 sw--color-black-900 pb-25 pt-35  wow fadeInUp" data-wow-delay="0.3s"><?php the_title(); ?></h2>
                                            <p class="sw--fs-16 sw--color-black-800 wow fadeInUp" data-wow-delay="0.4s"><?php the_excerpt(); ?></p>
                                            <div class="sw__button mt-40">
                                                <a href="<?php the_permalink(); ?>" class="wow fadeInUp" data-wow-delay="0.5s"><?php echo esc_html( $btn_text ); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php
							}
							wp_reset_postdata();
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Wedding service-->

<?php
get_footer();