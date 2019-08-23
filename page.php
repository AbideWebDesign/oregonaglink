<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oregonaglink
 */

get_header();

?>

<?php if (get_field('hero_banner_type')): ?>

	<?php get_template_part('template-parts/block', 'hero-banner'); ?>

<?php endif; ?>

<?php if (get_field('sub_navigation_type')): ?>

	<?php get_template_part('template-parts/block', 'sub-navigation'); ?>

<?php endif; ?>

<div class="py-3 bg-light">
	<div class="container">
		<div class="row">
			<div class="col">
				<?php if ( function_exists('yoast_breadcrumb') ): yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ); endif; ?>
			</div>
		</div>
		
		<?php
		while ( have_posts() ):
			
			the_post();
			
			if ( is_tribe_calendar() ) {			
				
				get_template_part('template-parts/content', 'tribe-events');
			
			} else {
			
				get_template_part('template-parts/content', 'page-builder');
				
			}
		
		endwhile; // End of the loop.
		?>
		
	</div>
</div>

<?php if ( get_field('include_cta_block') ): ?>

	<?php get_template_part('template-parts/block', 'cta'); ?>

<?php endif; ?>


<?php if ( get_field('include_bottom_page_links') ): ?>
	
	<?php get_template_part('template-parts/block', 'sibling-pages'); ?>

<?php else: ?>

	<?php get_template_part('template-parts/block', 'social-buttons'); ?>
	
<?php endif; ?>

<?php get_footer(); ?>