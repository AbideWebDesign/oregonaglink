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

	<div id="footer-top" class="bg-light">
		<div class="container">
			<div class="row">
				<div class="col-lg-7">
					<div class="text-accent py-3"><?php the_field('footer_top_text', 'options'); ?></div>
				</div>
				<div class="col-lg-5 d-flex justify-content-center align-items-center align-content-stretch px-0 px-lg-1">
					<div class="bg-medium py-2 px-1 h-100 w-100">
						<h4 class="text-white text-center mb-1"><?php the_field('footer_top_box_title', 'options'); ?></h4>
						<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="true"]'); ?>
						<div class="text-sm mt-1">
							<?php the_field('footer_top_box_text', 'options'); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="footer" class="bg-primary py-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 order-2 order-md-1">
					<?php 
						wp_nav_menu( array( 
							'theme_location' => 'menu-1', 
							'depth' => 2, 
							)
						);
					?>
				</div>
				<div id="footer-contact" class="col-lg-2 order-1 order-md-2">
					<h4 class="text-white mb-1">Contact Us</h4>
					<ul class="list-unstyled m-0">
						<li><?php the_field('address', 'options'); ?></li>
						<li><strong>P:</strong> <?php the_field('phone', 'options'); ?></li>
						<li><strong>F:</strong> <?php the_field('fax', 'options'); ?></li>
						<li><a href="mailto:<?php the_field('email', 'options'); ?>"><?php the_field('email', 'options'); ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
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
