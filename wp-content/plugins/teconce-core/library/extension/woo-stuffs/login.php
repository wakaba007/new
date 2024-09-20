<?php
/**
 * @snippet       WooCommerce User Login Shortcode
 * @compatible    WooCommerce 4.0
 */

   
add_shortcode( 'teconce_woo_login', 'teconce_separate_login_form' );
    
function teconce_separate_login_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
      <form class="woocommerce-form woocommerce-form-login login" method="post">

			<?php do_action( 'woocommerce_login_form_start' ); ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
			
				<input type="text" placeholder="<?php esc_html_e( 'Username or email address', 'teconce' ); ?>" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>
			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				
				<input class="woocommerce-Input woocommerce-Input--text input-text" type="password" placeholder="<?php esc_html_e( 'Password', 'teconce' ); ?>" name="password" id="password" autocomplete="current-password" />
			</p>

			<?php do_action( 'woocommerce_login_form' ); ?>
			<div class="row align-items-center">
			    <div class="col-12 col-md-6">
			        	<label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
					<input class="woocommerce-form__input woocommerce-form__input-checkbox" name="rememberme" type="checkbox" id="rememberme" value="forever" /> <span><?php esc_html_e( 'Remember me', 'teconce' ); ?></span>
				</label>
			    </div>
			    
				 <div class="col-12 col-md-6">
				<p class="woocommerce-LostPassword lost_password text-md-end">
				<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'teconce' ); ?></a>
			</p>
			</div>
			</div>

			<p class="form-row">
			
				<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
				<button type="submit" class="woocommerce-button button woocommerce-form-login__submit" name="login" value="<?php esc_attr_e( 'Log in', 'teconce' ); ?>"><?php esc_html_e( 'Log in', 'teconce' ); ?></button>
			</p>
			

			<?php do_action( 'woocommerce_login_form_end' ); ?>
		<div class="my-account-register-btn">
   <?php 
   $regpage = cs_get_option('register_page_link');
   ?>
   <?php if ($regpage){?>
    <a href="<?php echo esc_attr( esc_url( get_page_link( $regpage ) ) ) ?>" class="teconce_register_link"><?php esc_attr_e('New here? Create an Account','teconce');?></a>
    <?php } ?>
</div>
		</form>
		
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
   <?php
     
   return ob_get_clean();
}