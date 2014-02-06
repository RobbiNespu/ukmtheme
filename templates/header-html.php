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
<link rel="alternate stylesheet" type="text/css" media="screen" title="second" href="<?php echo get_template_directory_uri(); ?>/assets/css/fd8c7d827a5424968a2114340cdd222f-second.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="third" href="<?php echo get_template_directory_uri(); ?>/assets/css/20e80641e77bc4f2bd7e3e8def8c716c-third.css" />
<?php wp_head(); ?>