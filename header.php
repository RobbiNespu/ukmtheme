<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( 'templates/header', 'html' ); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<div class="banner mn_color ut_color">
<nav class="top">
  <div class="wrap">
    <div class="col-1-2">
    <?php 
      wp_nav_menu(array(
        'theme_location'    => 'top',
        'menu'              => 'Top Navigation',
        'menu_class'        => 'top-menu',
      )); 
    ?>
    </div>
    <div class="col-1-2">
      <?php get_template_part( 'templates/nav', 'searchBar' ); ?>
      <?php get_template_part( 'templates/off', 'canvas-tools' );?>
    </div>
  </div><!--.wrap-->
</nav>
<header>
  <h1 class="wrap logo">
    <a href="<?php bloginfo('url'); ?>">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </a>
  </h1>
  <div class="wrap secondary-menu">
    <?php 
      wp_nav_menu(array(
        'theme_location'    => 'main',
        'menu'              => 'Main Navigation',
        'container_id'      => 'cssmenu',
        'fallback_cb'       => false,
        'walker'            => new CSS_Menu_Maker_Walker()
      )); 
    ?>
  </div>
    <?php if ( is_home() ) { get_template_part( 'templates/slideshow', 'flexslider' ); } else {/* Frontpage Slideshow */} ?>
</header>
</div>