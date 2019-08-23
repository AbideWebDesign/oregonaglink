<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package oregonaglink
 */

$logo = get_field('logo', 'options');
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script type="text/javascript">
		jQuery(function ($) {
			
			var $searchlink = $('#search-toggle i');
			var $searchbar  = $('#search-bar');
			var $searchfield = $('#search-text');
			
			$('#search-toggle').on('click', function(e){
				
				if(!$searchbar.is(":visible")) { 
					// if invisible we switch the icon to appear collapsable
					$searchlink.removeClass('fas-search').addClass('fas-search-minus');
				} else {
					// if visible we switch the icon to appear as a toggle
					$searchlink.removeClass('fas-search-minus').addClass('fas-search');
				}
			
				$searchbar.slideToggle(250, function(){
					// callback after search bar animation
					$searchfield.focus();
				});
				
			});
			
			$('#searchform').submit(function(e){
				e.preventDefault(); // stop form submission
			});	
			
			// Override Bootstrap dropdown behavior
			$('#menu-primary .dropdown > a').click(function() {
				location.href = $(this).attr('href');
			});
			
			function toggleDropdown (e) {
				let _d = $(e.target).closest('.dropdown'),
				 _m = $('.dropdown-menu', _d);
				
				setTimeout(function(){
					let shouldOpen = e.type !== 'click' && _d.is(':hover');
					_m.toggleClass('show', shouldOpen);
					_d.toggleClass('show', shouldOpen);
					$('[data-toggle="dropdown"]', _d).attr('aria-expanded', shouldOpen);
				}, e.type === 'mouseleave' ? 50 : 0);
			}

			$('body')
				.on('mouseenter mouseleave','.dropdown',toggleDropdown)
				.on('click', '.dropdown-menu a', toggleDropdown);

			// Responsive embeds
			$( ".content-block-wrap p iframe" ).wrap( "<div class='embed-responsive embed-responsive-16by9'></div>" );
		});
	</script>
</head>

<body <?php body_class(); ?>>
	<div class="search">
		<div id="search-bar">
			<div class="search-bar-inner">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<form role="search" id="sites-search" action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
								 <label class="sr-only" for="search-text">Search</label>
								 <input type="text" class="search-field" id="search-text" placeholder="Search..." value="<?php echo get_search_query(); ?>" name="s">
								 <button type="submit" id="ss-icon"><i class="fa fa-search"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="nav-top" class="bg-primary d-none d-sm-none d-md-block">
		<div class="container">
			<div id="nav-top-container" class="d-flex justify-content-md-center justify-content-lg-end">
				<div id="nav-top-link" class="py-half pr-1">
					<?php 
						wp_nav_menu( array( 
							'theme_location' => 'menu-2', 
							'menu_class' => 'list-inline', 
							'depth' => 1, 
							'add_li_class'  => 'list-inline-item' 
							)
						);
					?>
				</div>
				<div class="py-half px-1">
					<ul class="list-inline">
						<li class="list-inline-item">
							<a href="https://www.facebook.com/OregonAglink/" target="_blank"><i class="fab fa-facebook-f"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://twitter.com/oregonaglink" target="_blank"><i class="fab fa-twitter"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.instagram.com/oregonaglink/" target="_blank"><i class="fab fa-instagram"></i></a>
						</li>
						<li class="list-inline-item">
							<a href="https://www.pinterest.com/adoptafarmer/" target="_blank"><i class="fab fa-pinterest"></i></a>
						</li>						
					</ul>
				</div>
				<div class="py-half px-1">
					<a href="#" id="search-toggle"><i class="fas fa-search"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div id="nav-top-mobile" class="d-flex d-sm-none">
		<div class="row no-gutters w-100">
			<div class="col-5">
				<a href="<?php echo home_url('/blog'); ?>" class="btn btn-sm btn-primary btn-block">Blog</a>
			</div>
			<div class="col-5">
				<a href="<?php echo home_url('/donate'); ?>" class="btn btn-sm btn-secondary btn-block">Donate</a>
			</div>
			<div class="col-2 d-flex justify-content-center align-items-center bg-light">
				<a href="#" id="search-toggle"><i class="fas fa-search"></i></a>
			</div>
		</div>
	</div>
	<div id="nav-main" class="container">
		<nav class="navbar navbar-expand-lg navbar-light">	
			<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image($logo['id'], 'full', false, array('class'=>'img-fluid logo')); ?></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu-primary" aria-controls="menu-primary" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php 
				wp_nav_menu( array( 
					'theme_location' => 'menu-1', 
				     'container'       => 'div',
				     'container_id'    => 'menu-primary',
				     'container_class' => 'collapse navbar-collapse',
				     'menu_id'         => false,
				     'menu_class'      => 'navbar-nav ml-auto',
				     'depth'           => 2,
				     'fallback_cb'     => 'bs4navwalker::fallback',
				     'walker'          => new bs4navwalker()
					)
				);
			?>
		</nav>
	</div>