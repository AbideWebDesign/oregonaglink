<?php
/**
 * Template Name: Simple Page
 *
 * @package oregonaglink
 */

get_header('simple');

?>


<div class="py-3 bg-light">
	<div class="container">
		
		<?php get_template_part('template-parts/content', 'page-builder'); ?>
		
	</div>
</div>

<?php get_footer('simple'); ?>