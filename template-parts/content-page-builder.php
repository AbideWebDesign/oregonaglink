<?php if (have_rows('page_blocks')): ?>

	<?php while (have_rows('page_blocks')): the_row(); ?>
		
		<?php if(get_row_layout() == 'hero_banner'): ?>

			<?php get_template_part('template-parts/block', 'hero-banner'); ?>
		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'sub_navigation'): ?>

			<?php get_template_part('template-parts/block', 'sub_navigation'); ?>
		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'lead_block'): ?>

			<?php get_template_part('template-parts/block', 'lead'); ?>
		
		<?php endif; ?>

		<?php if(get_row_layout() == 'content_block'): ?>

			<?php get_template_part('template-parts/block', 'content'); ?>
		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'list_group'): ?>

			<?php get_template_part('template-parts/block', 'list-group'); ?>
		
		<?php endif; ?>		
		
		<?php if(get_row_layout() == 'child_pages'): ?>

			<?php get_template_part('template-parts/block', 'child-pages'); ?>
		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'gallery_block'): ?>

			<?php get_template_part('template-parts/block', 'gallery'); ?>
		
		<?php endif; ?>
		
		<?php if(get_row_layout() == 'code'): ?>

			<?php get_template_part('template-parts/block', 'code'); ?>
		
		<?php endif; ?>
	
	<?php endwhile; ?>
	
<?php endif; ?>
