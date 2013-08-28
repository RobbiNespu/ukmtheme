<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="top-navigation-wrap">
	<div class="container primary-navigation">
		<?php get_template_part( 'inc/primary', 'menu' ); ?>
	</div>
</div>
<header class="header">
<div class="container logo">
	<a href="<?php bloginfo('url'); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
</div>
<div class="container secondary-navigation">
	<?php get_template_part( 'inc/secondary', 'menu' ); ?>
</div>
</header>