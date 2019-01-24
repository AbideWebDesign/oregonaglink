<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package oregonaglink
 */

get_header();
?>
<div class="py-3 bg-light">
	<div class="container">
		<div id="search-form" class="mb-3">
			<h2 class="mb-1">Search Results</h2>
			<form role="search" id="sites-search" class="form-inline" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
				<div class="form-row w-100">
					<div class="col-sm-12 mb-1">
						<label class="sr-only" for="search-text">Search</label>
						<input type="text" class="search-field form-control form-control-lg w-100" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
					</div>
					<div class="col-sm-2">	
						<button type="submit" class="btn btn-primary btn-block h-100">Search</button>
					</div>
				</div>
			</form>
		</div>	
		<?php if ( have_posts() ) : ?>
			
			<h4 class="alt mb-1"><?php search_results_title(); ?></h4>		

			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				
				the_post();
				
				get_template_part( 'template-parts/content', 'search' );

			endwhile;

			show_pagination_links();

		else :

			echo "No results returned.";

		endif;
		?>
		
	</div>
</div>

<?php get_template_part('template-parts/block', 'social-buttons'); ?>

<?php
get_footer();
