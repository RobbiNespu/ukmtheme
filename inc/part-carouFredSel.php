<?php
/**
 * @link http://www.ukm.my/template
 * @link http://dev7studios.com/plugins/caroufredsel
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
?>
<script type="text/javascript">
$(function() {
	$('#carousel').carouFredSel({
		width: '100%',
		items: {
			visible: 3,
			start: -1
		},
		scroll: {
			items: 1,
			duration: 1000,
			timeoutDuration: 6000
		},
		prev: '#prev',
		next: '#next',
		pagination: {
			container: '#pager',
			deviation: 1
		}
	});
});
</script>
<div id="wrapper">
<div id="carousel">
<?php
$args = array( 'post_type' => 'ukmtheme_slideshow', 'posts_per_page' => 10 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
    the_post_thumbnail();
endwhile;
?>
	</div><!--#carousel-->
	<a href="#" id="prev" title="Show previous"> </a>
	<a href="#" id="next" title="Show next"> </a>
	<div id="pager"></div>
</div><!--#wrapper-->