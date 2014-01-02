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
if (substr_count($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip')) ob_start('ob_gzhandler'); else ob_start();
?> 
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<?php get_template_part( 'templates/header', 'html' ); ?>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<nav class="top ut_nav">
  <div class="wrap">
    <div class="col-1-2">
      <?php
        wp_nav_menu( array(
          'theme_location'    => 'primary',
          'menu'              => 'Primary Navigation',
          'menu_class'        => 'primary-menu'
        ));
      ?>
    </div>
    <div class="col-1-2">
      <?php get_template_part( 'templates/nav', 'searchBar' ); ?>
      <?php get_template_part( 'templates/nav', 'tools-dropdown' ); ?>
    </div>
  </div><!--.wrap-->
</nav>
<header class="ut_color">
  <div class="wrap logo">
    <a href="<?php bloginfo('url'); ?>">
        <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
    </a>
  </div>
  <div class="wrap secondary-menu">
    <?php 
      wp_nav_menu(array(
        'theme_location'    => 'secondary',
        'menu'              => 'Secondary Navigation', 
        'container_id'      => 'cssmenu', 
        'walker'            => new CSS_Menu_Maker_Walker()
      )); 
    ?>
  </div>
</header>