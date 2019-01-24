<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oregonaglink
 */

get_header();
?>

<div class="py-3 bg-light">
	<div class="container">
		<div class="row">
			<div class="col">
				<h3 class="mb-2">News Articles</h3>
			</div>
		</div>
		<?php
		if ( have_posts() ) :
		
			/* Start the Loop */
			while ( have_posts() ) :
				
				the_post();
		
				get_template_part('template-parts/content', 'blog-archive');
				
		
			endwhile;
			show_pagination_links();
		endif;
		?>
	
	</div>
</div>


<?php get_template_part('template-parts/block', 'social-buttons'); ?>

<?php
get_footer();
