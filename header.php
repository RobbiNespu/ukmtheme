<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>assets/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div class="top-navigation-wrap">
	<div class="container primary-navigation">
		<?php wp_nav_menu( array( 
			'theme_location' => 'primary',
			'menu' => 'Primary Menu',
			'container' => 'div',
			'container_class' => '',
			) ); 
		?>
	</div>
</div>
<header class="header">
<div class="container logo">
	<a href="<?php bloginfo('url'); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
</div>
<div class="container secondary-navigation">
		<?php wp_nav_menu(array(
			'theme_location' => 'secondary',
			'menu' => 'Secondary Menu',
			'container_id' => 'cssmenu',
			'walker' => new CSS_Menu_Maker_Walker()
			)); 
		?>
</div>
</header>
