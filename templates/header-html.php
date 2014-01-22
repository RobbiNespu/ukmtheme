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
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<style>
.snd_color{background:<?php echo get_option('ukmtheme_snd_color');?>!important}.snd_color_nav{background:<?php echo get_option('ukmtheme_snd_color_nav');?>!important}.trd_color{background:<?php echo get_option('ukmtheme_trd_color');?>!important}.trd_color_nav{background:<?php echo get_option('ukmtheme_trd_color_nav');?>!important}
</style>