<?php

get_header();
bissful_breadcrumb_markup();
?>

	<div class="bissful-single-archive">


		<?php
		while ( have_posts() ) :
			the_post();

			the_content();

		endwhile; // End of the loop.
		?>

	</div>

<?php
get_footer();
