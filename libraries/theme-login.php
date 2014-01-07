<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Customizing_the_Login_Form
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */
function ukmthemelogin_logo() { ?>
    <style type="text/css">
    body.login div#login h1 a{background-image:none,url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/public/logo-login.svg?ver=6.1.1");background-size:320px 80px;background-position:center top;background-repeat:no-repeat;color:#999;height:80px;font-size:20px;font-weight:400;line-height:1.3em;margin:0 auto 25px;padding:0;text-decoration:none;width:320px;text-indent:-9999px;outline:0 none;overflow:hidden;display:block}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'ukmthemelogin_logo' );
?>