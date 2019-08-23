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
	
</head>

<body <?php body_class(); ?>>
	
<div id="nav-main-simple" class="container">
	<div class="row">
		<div id="nav-main" class="col mb-2">
			<a class="navbar-brand" href="<?php echo home_url(); ?>"><?php echo wp_get_attachment_image($logo['id'], 'full', false, array('class'=>'img-fluid logo')); ?></a>
		</div>
	</div>
</div>