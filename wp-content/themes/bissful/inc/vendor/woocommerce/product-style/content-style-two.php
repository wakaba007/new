<?php
 global $product;
$product_id = get_the_ID();
 ?>
 <div class="best-selling-products">
                            <a href="<?php the_permalink();?>"> <?php if ( has_post_thumbnail() ) {
                                the_post_thumbnail('thumbnail');
                            } ?></a>
                            <div class="sell-pro-content">
                                <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <div class="sell-pro-price">
                                    <?php echo maybe_unserialize($product->get_price_html()); ?>
                                </div>
                                <div class="add-to-cart-green-btn">
                                    <?php woocommerce_template_loop_add_to_cart();?>
                                </div>
                            </div>
                        </div>