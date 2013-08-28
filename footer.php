<?php
/**
 * @package WordPress
 * @subpackage UKM_Theme
 * @since UKM Theme 1.0
 */
wp_footer(); ?>
<footer class="footer">
	<div class="container footer-content">
		<div class="copyright"><?php echo __('Copyright &copy; The National University of Malaysia', 'ukmtheme'); ?></div>
		<?php get_template_part( 'inc/bottom', 'menu' ); ?>
	</div>
</footer>
</body>
</html>