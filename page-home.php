<?php // Template Name: Home ?>
<?php 
	
	get_header(); 
	
	// Get Images
	$lead_image_1_id = get_field('home_lead_box_image');
	$lead_image_2_id = get_field('home_lead_box_2_image');
	$membership_image_id = get_field('home_membership_image');
	$lead_image_1 = wp_get_attachment_image_src($lead_image_1_id, 'lead box', false);
	$lead_image_2 = wp_get_attachment_image_src($lead_image_2_id, 'lead box', false);
	$membership_image = wp_get_attachment_image_src($membership_image_id, 'lead box', false);
?>
<?php get_template_part('template-parts/content', 'page-builder'); ?>
<div id="section-home-lead" class="py-4">
	<div class="container">
		<div class="row">
			<div class="col-12 col-xl-8 align-content-stretch mb-1 mb-xl-0">
				<div class="row h-100 align-content-end">
					<div class="col-12 mb-2">
						<div class="row justify-content-center">
							<div class="col-lg-2 col-xl-3 justify-content-center align-items-center">
								<div class="text-lg mb-1 mb-lg-0">
									<?php the_field('home_lead_1'); ?>
								</div>
							</div>
							<div class="col-lg-8 col-xl-9">
								<div class="text-accent-lg">
									<?php the_field('home_lead_2'); ?>
									<a class="btn-text" href="<?php the_field('home_lead_link'); ?>"><?php the_field('home_lead_link_label'); ?> <i class="fas fa-arrow-right"></i></a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12">
						<div class="row no-gutters">
							<div class="col-12 col-sm-6 col-xl-7 align-content-stretch">
								<a href="<?php the_field('home_lead_box_link'); ?>">
									<div class="box-bg h-100" style="background-image: url(<?php echo $lead_image_1[0]; ?>);"></div>
								</a>
							</div>
							<div class="col-12 col-sm-6 col-xl-5 bg-primary d-flex justify-content-center align-items-center align-content-stretch">
								<h2 class="text-white py-2 py-md-4 px-1 px-md-2 mb-0"><a href="<?php the_field('home_lead_box_link'); ?>"><?php the_field('home_lead_box_text'); ?></a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-4 d-flex flex-row align-content-stretch">
				<div class="bg-brown w-100">
					<div class="row no-gutters h-100">
						<div class="col-12 col-sm-6 col-xl-12">
							<a href="<?php the_field('home_lead_box_2_link'); ?>">
								<div id="box-lead-2" class="box-bg h-100" style="background-image: url(<?php echo $lead_image_2[0]; ?>);"></div>
							</a>
						</div>
						<div class="col-12 col-sm-6 col-xl-12">
							<div class="d-flex flex-column h-100 justify-content-center text-center text-xl-left py-2 py-md-3 px-1 px-md-2">
								<div class="text-sub text-white"><?php the_field('home_lead_box_2_sub_text'); ?></div>
								<h2 class="text-white mb-0"><a href="<?php the_field('home_lead_box_2_link'); ?>"><?php the_field('home_lead_box_2_text'); ?></a></h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="section-home-membership" class="bg-light">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-6 order-2 order-md-1 d-flex align-items-center">
				<div class="py-2 py-md-4">
					<h2 class="mb-2"><?php the_field('home_membership_title'); ?></h2>
					<div class="mb-2"><?php the_field('home_membership_text'); ?></div>
					<a class="btn btn-primary" href="<?php the_field('home_membership_button_link'); ?>"><?php the_field('home_membership_button_label'); ?></a>
				</div>
			</div>
			<div class="col order-1 order-md-2">
				<div class="box-bg mt-1 mt-md-0" style="background-image: url(<?php echo $membership_image[0]; ?>);"></div>
			</div>
		</div>
	</div>
</div>
<?php get_template_part('template-parts/block', 'blog-posts'); ?>
<?php get_footer(); ?>