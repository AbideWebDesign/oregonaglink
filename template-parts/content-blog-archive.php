<div class="content-block content-block-blog mb-1">
	<div class="row align-items-center">
		
		<?php if (has_post_thumbnail()): ?>
		
			<div class="col-12 col-md-3 col-lg-4">
				<div class="mb-1 mb-md-0">
				
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			
				</div>
			</div>
		
		<?php endif; ?>
		
		<div class="<?php echo (has_post_thumbnail() ? 'col-12 col-md-9 col-lg-8' : 'col'); ?>">
			<div class="text-primary mb-1"><?php echo get_the_date(); ?></div>
			<h3 class="mb-0"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		</div>
	</div>
</div>