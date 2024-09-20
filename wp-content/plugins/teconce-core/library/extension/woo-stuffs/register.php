<?php
/**
 * @snippet       WooCommerce User Registration Shortcode
 * @compatible    WooCommerce 4.0
 */
   
add_shortcode( 'teconce_woo_register', 'teconce_separate_registration_form' );
    
function teconce_separate_registration_form() {
   if ( is_admin() ) return;
   if ( is_user_logged_in() ) return;
   ob_start();
 
   do_action( 'woocommerce_before_customer_login_form' );
 
   ?>
      <form method="post" class="teconce-register-form woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
					
					<input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="username" id="reg_username" autocomplete="username" value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"  placeholder="<?php esc_html_e( 'Username', 'woocommerce' ); ?>" /><?php // @codingStandardsIgnoreLine ?>
				</p>

			<?php endif; ?>

			<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				
				<input type="email" class="woocommerce-Input woocommerce-Input--text input-text" name="email" placeholder="<?php esc_html_e( 'Email address', 'woocommerce' ); ?>" id="reg_email" autocomplete="email" value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>" /><?php // @codingStandardsIgnoreLine ?>
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
				
					<input type="password" class="woocommerce-Input woocommerce-Input--text input-text" name="password" id="reg_password" autocomplete="new-password" placeholder="<?php esc_html_e( 'Password', 'woocommerce' ); ?>" />
				</p>

			<?php else : ?>

				<p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

			<?php endif; ?>

			<?php do_action( 'woocommerce_register_form' ); ?>

			<p class="woocommerce-form-row form-row">
				<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
				<button type="submit" class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit" name="register" value="<?php esc_attr_e( 'Create an Account', 'woocommerce' ); ?>"><?php esc_html_e( 'Create an Account', 'woocommerce' ); ?></button>
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>
			<div class="my-account-register-btn">
 <?php 
   $logpage = cs_get_option('login_page_link');
   ?>
   <?php if ($logpage){ ?>
    <a href="<?php echo esc_attr( esc_url( get_page_link( $logpage ) ) ) ?>" class="teconce_register_link"><?php esc_attr_e('Already have an account? Log in','teconce');?></a>
    <?php } ?>
</div>

		</form>
		
<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
   <?php
     
   return ob_get_clean();
}