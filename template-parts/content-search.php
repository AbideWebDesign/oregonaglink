<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package oregonaglink
 */

?>

<div class="bg-white p-1 mb-2">
	<div class="search_result_title mb-1">
		<strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong>
	</div>

	<?php if('page' === get_post_type()): ?>
		 
		<?php $excerpt = get_post_meta(get_the_ID(), '_yoast_wpseo_metadesc', true); ?>
			
		<?php echo $excerpt; ?>
	
	<?php elseif('post' === get_post_type()): ?>
		
		<?php the_excerpt(); ?>
		
	<?php endif; ?>
	
</div>