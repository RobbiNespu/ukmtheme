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
wp_footer(); ?>
<footer>
    <div class="wrap">
        <?php get_template_part( 'inc/footer', 'social-link' ); ?>
    </div>
    <div class="wrap copyright">
        <?php echo __( 'Copyright &copy;', 'ukmtheme' ); ?>
        <?php echo date( 'Y' ); ?>
        <?php echo __( 'The National University of Malaysia', 'ukmtheme' ); ?>        
    </div>
    <div class="wrap">
        <div class="copyright-detail-link-wrap">
            <ul class="copyright-detail-link">
                <li><a href=""><?php echo __( 'Copyright', 'ukmtheme' ); ?></a></li>
                <li><a href=""><?php echo __( 'Disclaimer', 'ukmtheme' ); ?></a></li>
                <li><a href=""><?php echo __( 'Privacy Policy', 'ukmtheme' ); ?></a></li>
                <li><a href=""><?php echo __( 'Security Policy', 'ukmtheme' ); ?></a></li>
                <li><a href=""><?php echo __( 'Contact Us', 'ukmtheme' ); ?></a></li>
                <li><?php echo __( 'Last Update:&nbsp;', 'ukmtheme' ); ?><?php echo date( 'd/m/Y' ); ?></li>
            </ul>
        </div>
    </div>
    <div class="wrap copyright">
        <?php echo __( 'Best view: Viewable with any modern web browser (Desktop &amp; Mobile)', 'ukmtheme' ); ?>
    </div>
</footer>
</body>
</html>