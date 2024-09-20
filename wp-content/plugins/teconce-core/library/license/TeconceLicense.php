<?php
require_once "BissfulBase.php";
class Bissful {
	public $plugin_file=__FILE__;
	public $responseObj;
	public $licenseMessage;
	public $showMessage=false;
	public $slug="bissful";
	function __construct() {
	
		$licenseKey=get_option("Bissful_lic_Key","");
		$liceEmail=get_option( "Bissful_lic_email","");
		$templateDir=get_template_directory(); //or dirname(__FILE__);
		if(Bissful_Base::CheckWPPlugin($licenseKey,$liceEmail,$this->licenseMessage,$this->responseObj,$templateDir."/style.css")){
			add_action( 'admin_menu', [$this,'ActiveAdminMenu'],99999);
			add_action( 'admin_post_Bissful_el_deactivate_license', [ $this, 'action_deactivate_license' ] );
			//$this->licenselMessage=$this->mess;
			//***Write you plugin's code here***

		}else{
			if(!empty($licenseKey) && !empty($this->licenseMessage)){
				$this->showMessage=true;
			}
			update_option("Bissful_lic_Key","") || add_option("Bissful_lic_Key","");
			add_action( 'admin_post_Bissful_el_activate_license', [ $this, 'action_activate_license' ] );
			add_action( 'admin_menu', [$this,'InactiveMenu'],99999);
		}
        }

	function ActiveAdminMenu(){
		 
	
	add_submenu_page(  'bissful-admin-menu', "Bissful License", "License Info", "activate_plugins",  "bissful", [$this,"Activated"] );

	}
	function InactiveMenu() {
	
	add_submenu_page(  'bissful-admin-menu', "Bissful License", "License Info", "activate_plugins",  "bissful", [$this,"LicenseForm"] );
		
	}
	function action_activate_license(){
		check_admin_referer( 'el-license' );
		$licenseKey=!empty($_POST['el_license_key'])?sanitize_text_field($_POST['el_license_key']):"";
		$licenseEmail=!empty($_POST['el_license_email'])?sanitize_email($_POST['el_license_email']):"";
		update_option("Bissful_lic_Key",$licenseKey) || add_option("Bissful_lic_Key",$licenseKey);
		update_option("Bissful_lic_email",$licenseEmail) || add_option("Bissful_lic_email",$licenseEmail);
		update_option('_site_transient_update_themes','');
		wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
	}
	function action_deactivate_license() {
		check_admin_referer( 'el-license' );
		$message="";
		if(Bissful_Base::RemoveLicenseKey(__FILE__,$message)){
			update_option("Bissful_lic_Key","") || add_option("Bissful_lic_Key","");
			update_option('_site_transient_update_themes','');
		}
    	wp_safe_redirect(admin_url( 'admin.php?page='.$this->slug));
    }
	function Activated(){
	    
		?>
		<?php $bissfultheme = wp_get_theme(); ?>
		
		<div class="wrap about-wrap bissful-wrap">
		    
		    <h1><?php _e( 'Bissful Licensing', 'bissful-core' ); ?></h1>

    <div class="about-text"><?php echo esc_html__( 'bissful theme is now installed and ready to use!', 'bissful-core' ); ?></div>



		 <h2 class="nav-tab-wrapper">
        <?php
        printf( '<a href="admin.php?page=bissful-admin-menu" class="nav-tab">%s</a>', __( 'Welcome', 'bissful-core' ) );
         printf( '<a href="admin.php?page=teconce_options" class="nav-tab">%s</a>', __( 'Theme Options', 'bissful' ) );
         printf( '<a href="admin.php?page=bissful" class="nav-tab nav-tab-active">%s</a>', __( 'License', 'bissful-core' ) );
       
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bissful-wizard&step=content' ), __( 'Demo Import', 'bissful-core' ) );
        
       
        ?>
    </h2>
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="Bissful_el_deactivate_license"/>
            <div class="el-license-container">
                <h3 class="el-license-title"><?php _e("Bissful License Information",$this->slug);?> </h3>
               
                <ul class="el-license-info">
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Status",$this->slug);?></span>

                        <?php if ( $this->responseObj->is_valid ) : ?>
                            <span class="el-license-valid"><?php _e("Valid",$this->slug);?></span>
                        <?php else : ?>
                            <span class="el-license-valid"><?php _e("Invalid",$this->slug);?></span>
                        <?php endif; ?>
                    </div>
                </li>

                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("License Type",$this->slug);?></span>
                        <?php echo $this->responseObj->license_title; ?>
                    </div>
                </li>

               <li>
                   <div>
                       <span class="el-license-info-title"><?php _e("License Expired on",$this->slug);?></span>
                       <?php echo $this->responseObj->expire_date;
                       ?>
                   </div>
               </li>

               <li>
                   <?php
                   $currentDate = date('Y-m-d');

                  $currentDate = date('Y-m-d', strtotime($currentDate));
                    $date2    = trim($this->responseObj->support_end) ;
                   $date4 = date("j F, Y", strtotime($date2));
                   $date5 = date("Y-m-d", strtotime($date2))
                   
                   ?>
                   <div <?php if ($currentDate > $date5) { ?>class="bissful-expired"<?php } ?> >
                       <span class="el-license-info-title"><?php _e("Support Expired on",$this->slug);?></span>
                       
                       <span class="support-period-dates">
                         <?php echo $date4;?>
                           </span>
                           <?php if ($currentDate > $date5) { ?>
                       <?php
                           
                        if(!empty($this->responseObj->support_renew_link)){
                            ?>
                            
                               <a target="_blank" class="el-blue-btn" href="<?php echo $this->responseObj->support_renew_link; ?>">Renew</a>
                            <?php
                        }
                        }
                       ?>
                   </div>
               </li>
               
        
                <li>
                    <div>
                        <span class="el-license-info-title"><?php _e("Your License Key",$this->slug);?></span>
                        <span class="el-license-key"><?php echo esc_attr( substr($this->responseObj->license_key,0,9)."XXXXXXXX-XXXXXXXX".substr($this->responseObj->license_key,-9) ); ?></span>
                    </div>
                </li>
                </ul>
                <div class="el-license-active-btn">
                    <?php wp_nonce_field( 'el-license' ); ?>
                    <?php submit_button('Deactivate'); ?>
                </div>
            </div>
        </form>
        </div>
		<?php
	}
	
	function LicenseForm() {
		?>
			<?php $bissfultheme = wp_get_theme(); ?>
		<div class="wrap about-wrap bissful-wrap">
		    
		    <h1><?php _e( 'Bissful Licensing', 'bissful-core' ); ?></h1>

    <div class="about-text"><?php echo esc_html__( 'bissful theme is now installed and ready to use!', 'bissful-core' ); ?></div>


		<h2 class="nav-tab-wrapper">
        <?php
        printf( '<a href="admin.php?page=bissful-admin-menu" class="nav-tab">%s</a>', __( 'Welcome', 'bissful-core' ) );
         printf( '<a href="admin.php?page=teconce_options" class="nav-tab">%s</a>', __( 'Theme Options', 'bissful' ) );
         printf( '<a href="admin.php?page=bissful" class="nav-tab nav-tab-active">%s</a>', __( 'License', 'bissful-core' ) );
       
        printf( '<a href="%s" class="nav-tab">%s</a>', admin_url( 'admin.php?page=bissful-wizard&step=content' ), __( 'Demo Import', 'bissful-core' ) );
        ?>
    </h2>
    <div class="bissful-license-details">
        <form method="post" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>">
            <input type="hidden" name="action" value="Bissful_el_activate_license"/>
            <div class="el-license-container">
                <h3 class="el-license-title"> <?php _e("Theme Purchase Code",$this->slug);?></h3>
               
				<?php
					if(!empty($this->showMessage) && !empty($this->licenseMessage)){
						?>
                        <div class="bissful-notice notice-error is-dismissible">
                            <p><?php echo $this->licenseMessage; ?></p>
                        </div>
						<?php
					}
				?>
              
    		    <div class="el-license-field">
    			    <label for="el_license_key"><?php _e("License code",$this->slug);?></label>
    			    <input type="text" class="regular-text code" name="el_license_key" size="50" placeholder="xxxxxxxx-xxxxxxxx-xxxxxxxx-xxxxxxxx" required="required">
    		    </div>
                <div class="el-license-field">
                    <label for="el_license_key"><?php _e("Email Address",$this->slug);?></label>
                    <?php
                        $purchaseEmail   = get_option( "Bissful_lic_email", get_bloginfo( 'admin_email' ));
                    ?>
                    <input type="text" class="regular-text code" name="el_license_email" size="50" value="<?php echo $purchaseEmail; ?>" placeholder="" required="required">
                    <div><small><?php _e("We will send update news of this product by this email address, don't worry, we hate spam",$this->slug);?></small></div>
                </div>
                <div class="el-license-active-btn">
					<?php wp_nonce_field( 'el-license' ); ?>
					<?php submit_button('Activate'); ?>
                </div>
            </div>
        </form>
        </div>
        
        </div>
		<?php
	}
}

new Bissful();