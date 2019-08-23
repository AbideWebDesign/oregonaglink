<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oregonaglink
 */

?>

	<div id="footer-bottom" class="bg-primary-dark py-1">
		<div class="container">
			<div class="row">
				<div class="col-12 text-center text-xs">
					&copy; <?php echo date('Y'); ?> Oregon Aglink. <?php  the_field('footer_bottom_text', 'options'); ?>. <span><a href="https://abidewebdesign.com" target="_blank">Website Design by Abide Web Design</a></span>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>
