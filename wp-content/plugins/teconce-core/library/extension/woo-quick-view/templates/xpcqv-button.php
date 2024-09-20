<?php
global $post;
?>
<div class="quick-view-button">
	<a href="#" class="<?php echo $button_class; ?> teconce-grid-quick-view-btn" data-product_id="<?php echo $post->ID; ?>">
		<i class="teconce-icon-eye"></i>
		<!-- loader-image -->
      <div class="<?php echo $image_class; ?>"><div class="xpc-loading-circle">  <svg class="xpc-spinner" viewBox="0 0 50 50">
  <circle class="path" cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
</svg></div></div>
	</a>
</div>