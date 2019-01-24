<?php $children = get_page_links($post->ID); ?>

<?php if ($children): ?>

	<div class="py-4">
		<div class="container">
			<div class="row">
				<div class="col mb-2">
					<h3>Explore <span class="thin">More</span></h3>
				</div>
			</div>
			<div class="row">
				
				<?php foreach($children as $child_id): ?>
					
					<?php if ($child_id->ID != $post->ID): ?>

						<div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-1">
							<div class="sibling-page-link-wrap">
								<div class="sibling-page-link-image">
									<a href="<?php the_permalink($child_id->ID); ?>"><?php echo wp_get_attachment_image(get_field('page_nav_image', $child_id), 'default-3', false, array('class' => 'img-fluid w-100')); ?></a>
								</div>
								<a class="sibling-page-link" href="<?php echo get_the_permalink($child_id->ID); ?>">
									<div class="sibling-page-link-text">
										<div class="sibling-page-title"><?php echo get_the_title($child_id->ID); ?></div>
									</div>
								</a>
							</div>
						</div>

					<?php endif; ?>

				<?php endforeach; ?>

			</div>
		</div>
	</div>

<?php endif; ?>