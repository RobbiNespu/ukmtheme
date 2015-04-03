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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<title><?php wp_title( '&bull;', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<?php wp_head(); ?>
<style type="text/css">
  .uk-button-primary,
  .uk-button-primary:hover,
  .uk-button-primary:focus {
    background: <?php echo get_option('ukmtheme_mn_color'); ?>;
  }
  .mn_color {
    background: #ed1c24;
    background: <?php echo get_option('ukmtheme_mn_color'); ?>;
  }
  .snd_color {
    background: <?php echo get_option('ukmtheme_snd_color'); ?>;
  }
  .trd_color {
    background: <?php echo get_option('ukmtheme_trd_color'); ?>;
  }
</style>
</head>
<body <?php body_class(); ?>>
<div class="page-wrap">
<div class="clearfix header-wrap mn_color ut_color">
<nav class="top">
  <div class="wrap pure-g pure-u-g">
    <div class="pure-u-1-2">
    <?php
      wp_nav_menu(array(
        'theme_location'  => 'top',
        'menu'            => 'Top Navigation',
        'menu_class'      => 'top-menu',
      ));
    ?>
    </div>
    <div class="pure-u-1-2">
      <?php get_template_part( 'templates/nav', 'search' ); ?>
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
    <?php if ( is_home() ) { get_template_part( 'templates/slideshow', 'owl' ); } else {/** Frontpage Slideshow */} ?>
</header>
</div>
