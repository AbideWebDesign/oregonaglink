<?php
	
	$args = array(
		'posts_per_page' => '4',	
	);
	
	$query = new WP_Query($args);
		
?>
<div class="py-4">
	<div class="container">
		<div class="row">
			<div class="col mb-2">
				<h3>Agriculture <span class="thin">Stories</span></h3>
			</div>
		</div>
		<div class="row">
			
			<?php while($query->have_posts()): $query->the_post(); ?>
			
				<div class="col-lg-3">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-4 col-lg-12 mb-1">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-thumbnail', array('class' => 'img-fluid')); ?></a>
						</div>
						<div class="col-12 col-sm-6 col-md-8 col-lg-12 align-self-sm-center align-self-md-center">
							<h3 class="mb-1 text-md"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="mb-0 text-sm"><?php the_excerpt(); ?></p>
						</div>
					</div>
				</div>
			
			<?php endwhile; ?>
			
			<?php wp_reset_query(); ?>
						
		</div>
		<div class="row">
			<div class="col-12 text-center">
				<hr class="mt-1 mb-2">
				<a href="<?php echo home_url('/blog'); ?>" class="btn btn-primary">Read More Articles</a>
			</div>
		</div>
	</div>
</div>