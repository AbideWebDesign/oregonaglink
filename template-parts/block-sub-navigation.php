<?php 
	$page_ids = array();

	if (get_field('sub_navigation_type') == 'Custom') {

		if (have_rows('sub_navigation_pages')) {
						
			while (have_rows('sub_navigation_pages')) {
				
				the_row();

				$page_ids[] = array('id' => get_sub_field('page'), 'label' => get_sub_field('navigation_label'));
				
			}
		}
		
	} else {
		
		$page_objects = get_page_links($post->ID);
		
		foreach ($page_objects as $page) {
			
			$page_ids[] = array('id' => $page->ID, 'label' => get_the_title($page->ID));
			
		}
		
	}
?>

<div id="subnav" class="<?php echo (get_field('hero_banner_type') ? "subnav" : "subnav-full bg-brown"); ?> d-none d-md-block">
	<div class="container-fluid">

		<?php if ($page_ids): ?>

			<div class="row justify-content-center">
				<div class="col-12 text-center">
					<ul class="d-inline-block list-inline text-center mb-0 <?php echo (get_field('hero_banner_type') ? "bg-brown" : ""); ?>">
				
						<?php foreach($page_ids as $page): ?>
						
							<li class="list-inline-item <?php echo ($page['id'] == $post->ID ? 'active' : ''); ?>">
								<a href="<?php echo get_the_permalink($page['id']); ?>"><?php echo $page['label']; ?></a>
							</li>
				
						<?php endforeach; ?>
				
					</ul>
				</div>
			</div>
					
		<?php endif; ?>
			
	</div>
</div>


