<?php if (get_field('page_cta_block')): ?>
	
	<?php $value = get_field('page_cta_block'); ?>
		
	<?php if(have_rows('call_to_action_blocks', 'option')): ?>
						
		<?php while(have_rows('call_to_action_blocks', 'option')): the_row(); ?>
			
				<?php if(get_sub_field('cta_title') == $value): ?>

					<?php $cta_image = wp_get_attachment_image_src(get_sub_field('cta_image'), 'cta banner', false);; ?>

					<div class="bg-img" style="background-image: url(<?php echo $cta_image[0]; ?>);">
						<div class="bg-overlay"></div>
						<div class="bg-img-content py-4 text-center">
							<h4 class="mb-1 text-white"><?php the_sub_field('cta_sub_title'); ?></h4>
							<h2 class="text-white"><?php the_sub_field('cta_title'); ?></h2>
						</div>
					</div>
					<div class="bg-brown py-2">
						<div class="container">
							<div class="row">
								<div class="col-12">
									<div class="content-block">
										<div class="content-block-wrap">
											<div class="content-block-content align-self-center">
												<h3 class="mb-1"><?php the_sub_field('cta_box_title'); ?></h3>
												<div class="no-margin">
													
													<?php the_sub_field('cta_box_content'); ?>
													
													<?php if (get_sub_field('include_a_button')): ?>
													
														<div class="mt-2">
															<a href="<?php the_sub_field('button_link'); ?>" class="btn btn-primary"><?php the_sub_field('button_label'); ?></a>
														</div>
													
													<?php endif; ?>
													
												</div>
											</div>
											
											<?php if(get_sub_field('cta_box_image')): ?>
											
												<div class="content-block-image">
											
													<?php $image = get_sub_field('cta_box_image'); ?>
											
													<?php echo wp_get_attachment_image($image, 'content block', false); ?>
											
												</div>
											
											<?php endif; ?>									
									
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				
				<?php endif; ?>
			
		<?php endwhile; ?>
	
	<?php endif; ?>
		 
<?php endif; ?>