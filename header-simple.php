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
	<link rel="icon" type="image/png" href="<?php the_field('favicon', 'options'); ?>" />
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-146403986-1"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());
	
	  gtag('config', 'UA-146403986-1');
	</script>
	
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>
	
<div id="nav-main-simple" class="container">
	<div class="row">
		<div id="nav-main" class="col my-2">
			<a class="navbar-brand" href="https://aglink.org"><?php echo wp_get_attachment_image($logo['id'], 'full', false, array('class'=>'img-fluid logo')); ?></a>
		</div>
	</div>
</div>