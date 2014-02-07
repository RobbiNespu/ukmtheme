<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Post_Types
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
 ?>
<header class="mobile-header">
<div class="wrap">
<?php 
    wp_nav_menu(array(
        'theme_location'    => 'mobile',
        'menu'              => 'Mobile Navigation',
        'container_id'      => 'mobmenu', 
        'walker'            => new Mobile_Menu_Maker_Walker()
    )); 
?>
</div>
</header>