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
<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<nav class="top">
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
                <?php get_template_part( 'inc/part', 'searchBar' ); ?>
                <?php get_template_part( 'inc/part', 'tools' ); ?>
            </div>
    </div><!--.wrap-->
</nav>
<header>
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