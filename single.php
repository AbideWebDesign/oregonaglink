<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package oregonaglink
 */

get_header();

?>
<div class="py-4 bg-primary">
	<div class="container">
		<div class="row">
			<div class="col-12 text-center">
				<h4 class="mb-1"><a class="text-white" href="<?php echo home_url(); ?>/blog">Oregon Aglink Blog</a></h4>
				<h1 class="text-white"><?php the_title(); ?></h1>
				<div class="text-sm text-white mt-1">Posted on <?php the_date(); ?></div>
			</div>
		</div>
	</div>
</div>
<div class="py-1 bg-brown">
	<div class="container">
		<div class="row align-items-center">
			<div class="col mr-auto d-none d-md-block">
				<?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<div class="text-sm text-white" id="breadcrumbs">','</div>' );
					}
				?>
			</div>
			<div class="col">
				<div class="sharethis-inline-share-buttons text-center text-md-right"></div>
			</div>
		</div>
	</div>
</div>
<div class="pt-1 pb-3 bg-light">
	<div class="container">
		<?php
		while ( have_posts() ) :
		
			the_post();
		
			get_template_part('template-parts/content', 'blog');
		
		endwhile; // End of the loop.
		?>
		
	</div>
</div>

<?php get_template_part('template-parts/block', 'social-buttons'); ?>

<?php
get_footer();
