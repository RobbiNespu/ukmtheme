<?php
/**
 * @link http://www.ukm.my/template
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 *
 * Tetapan muka hadapan laman
 */
get_header(); ?>
<div class="home-content-wrap">
  <div class="wrap home-content">
  <?php
    $widget_news_scroller = get_option('ukmtheme_widget_news');
    $widget_three_box = get_option('ukmtheme_widget_three');
    $widget_four_box = get_option('ukmtheme_widget_four');
    $widget_basic = get_option('ukmtheme_widget_basic');
    $widget_custom = get_option('ukmtheme_widget_custom');
    
    get_template_part( 'templates/widget', $widget_news_scroller );
    get_template_part( 'templates/widget', $widget_basic );
    get_template_part( 'templates/widget', $widget_custom );
    get_template_part( 'templates/widget', $widget_three_box );
    get_template_part( 'templates/widget', $widget_four_box );
  ?>
  </div>
</div>
<?php get_footer(); ?>