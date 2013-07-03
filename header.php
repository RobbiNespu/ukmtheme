<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"> <!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title><?php bloginfo('name'); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
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
