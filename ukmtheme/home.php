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

<div class="clearfix slideshow ut_color">
	<?php
	/**
	 *
	 * Slideshow imej pada muka hadapan laman web
	 * Aktifkan satu sahaja dengan memadan "//" sebelum perkataan get_template_part
	 * Tandakan "//" kembali sekiranya memilih opsyen yang lain
	 * Opsyen: carouFredSel, BX-Slider dan NivoSlider
	 * 20131216 20:20
	 *
	 */
	?>
    <?php //get_template_part( 'templates/slideshow', 'carouFredSel' ); ?>
    <?php //get_template_part( 'templates/slideshow', 'bxslider' ); ?>
    <?php get_template_part( 'templates/slideshow', 'nivoSlider' ); ?>
</div>
<div class="wrap clearfix">
    <?php get_template_part( 'templates/widget', 'announcement' ); ?>
</div>
<div class="wrap clearfix">
    <div class="col-1-1">
    <?php if (dynamic_sidebar( 'sidebar-4' )) : else : ?><?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>