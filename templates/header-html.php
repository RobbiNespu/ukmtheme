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
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width">
<title><?php if(is_home()) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo wp_title(" | ", false, right); echo bloginfo("name"); } ?></title>
<meta name="description" content="<?php bloginfo( 'description' ); ?>">
<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.ico" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php wp_head(); ?>
<style>
.uk-button-primary,
.uk-button-primary:hover,
.uk-button-primary:focus {
  background: <?php echo get_option('ukmtheme_mn_color'); ?>;
}
.mn_color {
  background: #b00000; /* Old browsers */
  background: -moz-linear-gradient(top,  #b00000 0%, #d10000 50%, #b00000 100%); /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b00000), color-stop(50%,#d10000), color-stop(100%,#b00000)); /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* Opera 11.10+ */
  background: -ms-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* IE10+ */
  background: linear-gradient(to bottom,  #b00000 0%,#d10000 50%,#b00000 100%); /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b00000', endColorstr='#b00000',GradientType=0 ); /* IE6-9 */
  background: <?php echo get_option('ukmtheme_mn_color'); ?> url("<?php echo get_option('ukmtheme_bg'); ?>") no-repeat top center;
}
.snd_color {
  background: <?php echo get_option('ukmtheme_snd_color'); ?> url("<?php echo get_option('ukmtheme_bg'); ?>") no-repeat top center;
}
.trd_color {
  background: <?php echo get_option('ukmtheme_trd_color'); ?> url("<?php echo get_option('ukmtheme_bg'); ?>") no-repeat top center;
}
</style>