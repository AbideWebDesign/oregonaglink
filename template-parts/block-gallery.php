<?php $include_image = get_sub_field('gallery_with_image'); ?>

<div class="gallery-block">
	
	<?php if (get_sub_field('gallery_type') == 'Profile'): ?>
		
		<div class="row justify-content-center">
	
			<?php while(have_rows('gallery_items')): the_row(); ?>
					
				<div class="col-sm-6 col-md-4 col-lg-3 align-self-stretch mb-2">
					<div class="content-block h-100">
						<div class="py-1 px-2 text-center">
							
							<?php if ($include_image): ?>
							
								<?php $image_id = (get_sub_field('gallery_item_image') ? get_sub_field('gallery_item_image') : '3205'); ?>
								
								<?php echo wp_get_attachment_image($image_id, 'profile', false, array('class'=>'img-fluid rounded-circle mb-2 px-1')); ?>
								
							<?php endif ?>
							
							<h4><?php echo (get_sub_field('gallery_item_title') ? the_sub_field('gallery_item_title') : 'Placeholder Title'); ?></h4>
							
							<?php if(get_sub_field('gallery_item_subtitle')): ?>
							
								<p class="mb-0 text-sm">
									
									<strong><?php the_sub_field('gallery_item_subtitle'); ?></strong>
									
									<?php if (get_sub_field('gallery_item_phone') || get_sub_field('gallery_item_email')): ?>
									
											<?php if (get_sub_field('gallery_item_phone')): ?>
												
												<br><?php the_sub_field('gallery_item_phone'); ?>
											
											<?php endif; ?>
											
											<?php if (get_sub_field('gallery_item_email')): ?>
												
												<br><a href="mailto:<?php the_sub_field('gallery_item_email'); ?>"><?php the_sub_field('gallery_item_email'); ?></a>
											
											<?php endif; ?>
																				
									<?php endif; ?>
									
								</p>
							
							<?php endif; ?>
							
						</div>
					</div>
				</div>
			
			<?php endwhile; ?>
		
		</div>
	
	<?php elseif (get_sub_field('gallery_type') == 'Image'): ?>
	
		<div class="row justify-content-center">
	
			<?php while(have_rows('gallery_items')): the_row(); ?>
				
				<?php $link = get_sub_field('gallery_item_link'); ?>
				
				<div class="col-sm-6 col-md-4 col-lg-3 align-self-stretch mb-2">
					<div class="content-block h-100">

						<?php if ($include_image): ?>
						
							<?php $image_id = (get_sub_field('gallery_item_image') ? get_sub_field('gallery_item_image') : '3205'); ?>
							
							<?php if ($link): ?>
						
								<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
									
							<?php endif; ?>
							
							<?php echo wp_get_attachment_image($image_id, 'profile', false, array('class'=>'img-fluid w-100')); ?>
							
							<?php if ($link): ?>
								
								</a>
								
							<?php endif; ?>
						
						<?php endif; ?>
						
						<?php if (get_sub_field('gallery_item_title')): ?>
						
							<div class="py-2 px-2 text-center">
								<h4>
									<?php if ($link): ?>
					
										<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
								
									<?php endif; ?>
									
									<?php echo (get_sub_field('gallery_item_title') ? the_sub_field('gallery_item_title') : 'Placeholder Title'); ?>
								
									<?php if ($link): ?>
										
										</a>
										
									<?php endif; ?>	
								
								</h4>
								
								<?php if (get_sub_field('gallery_item_subtitle')): ?>
								
									<p class="mb-0 text-sm">
									
										<strong><?php the_sub_field('gallery_item_subtitle'); ?></strong>
										
										<?php if (get_sub_field('gallery_item_phone') || get_sub_field('gallery_item_email')): ?>
										
												<?php if (get_sub_field('gallery_item_phone')): ?>
													
													<br><?php the_sub_field('gallery_item_phone'); ?>
												
												<?php endif; ?>
												
												<?php if (get_sub_field('gallery_item_email')): ?>
													
													<br><a href="mailto:<?php the_sub_field('gallery_item_email'); ?>"><?php the_sub_field('gallery_item_email'); ?></a>
												
												<?php endif; ?>
																					
										<?php endif; ?>
										
									</p>

								<?php endif; ?>
								
							</div>
						
						<?php endif; ?>
					
					</div>
				</div>
			
			<?php endwhile; ?>
		
		</div>

	
	<?php endif; ?>
	
</div>