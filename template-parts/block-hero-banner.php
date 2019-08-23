<?php if (get_field('hero_banner_type') == 'Main'): ?>
	
	<div id="section-hero-banner" class="bg-yellow d-flex">
		<div class="hero-banner-text">
			<div class="hero-banner-text-inner">
				<h1 class="text-white mb-1 mb-md-2"><?php the_field('hero_banner_title'); ?></h1>
				<p class="text-accent-lg text-white"><?php the_field('hero_banner_text'); ?></p>
				<?php if (get_field('add_buttons')): ?>
					<ul class="list-inline mb-0">
						<li class="list-inline-item"><a class="btn btn-primary" href="<?php the_field('hero_banner_button_1_link'); ?>"><?php the_field('hero_banner_button_1_label'); ?></a></li>
						<?php if (get_field('hero_banner_button_2_label')): ?>
							<li class="list-inline-item"><a class="btn btn-white" href="<?php the_field('hero_banner_button_2_link'); ?>"><?php the_field('hero_banner_button_2_label'); ?></a></li>
						<?php endif; ?>
					</ul>
				<?php endif; ?>
			</div>
		</div>
		<div class="hero-banner-image">
			<div class="hero-banner-image-inner">
				<div class="hero-banner-slide">
					<?php echo wp_get_attachment_image(get_field('hero_banner_image'), 'hero banner', false); ?>
				</div>
			</div>
		</div>
	</div>

<?php else: ?>

	<?php $bg_img = wp_get_attachment_image_src(get_field('hero_banner_image'), 'hero banner', false); ?>

	<div id="section-hero-banner" class="bg-img bg-img-lg text-center"  style="background-image: url('<?php echo $bg_img[0]; ?>')">
		<div class="bg-overlay"></div>
		<div class="bg-img-content py-4 text-center">
			<h4 class="mb-1 text-white"><?php the_field('header_banner_sub_title'); ?></h4>
			<h2 class="text-white"><?php the_field('hero_banner_title'); ?></h2>
		</div>
	</div>

<?php endif; ?>
