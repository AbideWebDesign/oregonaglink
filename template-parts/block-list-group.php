<!-- List Group Block -->
<?php $x = 0; ?>
<div class="py-2">
	<div class="content-block p-1 py-md-2 px-md-3">
		<div class="row justify-content-center">
			<div class="col">
				<h3 class="mb-2"><?php the_sub_field('list_group_title'); ?></h3>
				<?php if (get_sub_field('list_group_text')): ?>
					<?php the_sub_field('list_group_text'); ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-12">
				<?php $accordion_name = str_replace(' ', '-', get_sub_field('list_group_title')); ?>
				<div id="accordion-<?php echo $accordion_name; ?>" class="accordion">
					<?php if (have_rows('list_group_items')): ?>
						<?php while (have_rows('list_group_items')): the_row(); ?>
							<?php $x ++; ?>
							<div class="card">
								<div class="card-header" id="heading<?php echo $x; ?>">
									<h5 class="mb-0">
										<button class="btn btn-link d-block collapsed w-100 text-left" data-toggle="collapse" data-target="#collapse-<?php echo $accordion_name; ?>-<?php echo $x; ?>" aria-expanded="false" aria-controls="collapse<?php echo $x; ?>">
											<?php the_sub_field('list_item_title'); ?>
										</button>
									</h5>
								</div>
								<div id="collapse-<?php echo $accordion_name; ?>-<?php echo $x; ?>" class="collapse" aria-labelledby="heading<?php echo $x; ?>" data-parent="#accordion-<?php echo $accordion_name; ?>">
									<div class="card-body"><?php the_sub_field('list_item_content'); ?></div>
								</div>
							</div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- List Group Block -->
