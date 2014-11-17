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
function ukmtheme_login_logo() { ?>
  <style type="text/css">
  body.login div#login h1 a {
    background-image: none, url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/public/logo-login.png?ver=6.2");
    background-size: 320px 80px;
    background-position: center top;
    background-repeat: no-repeat;
    color: #999;
    height: 80px;
    font-size: 20px;
    font-weight: 400;
    line-height: 1.3em;
    margin: 0 auto 25px;
    padding: 0;
    text-decoration: none;
    width: 320px;
    text-indent: -9999px;
    outline: 0 none;
    overflow: hidden;
    display: block;
  }
  body.login {
    background: #b00000; /* Old browsers */
    background: -moz-linear-gradient(top,  #b00000 0%, #d10000 50%, #b00000 100%); /* FF3.6+ */
    background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#b00000), color-stop(50%,#d10000), color-stop(100%,#b00000)); /* Chrome,Safari4+ */
    background: -webkit-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* Chrome10+,Safari5.1+ */
    background: -o-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* Opera 11.10+ */
    background: -ms-linear-gradient(top,  #b00000 0%,#d10000 50%,#b00000 100%); /* IE10+ */
    background: linear-gradient(to bottom,  #b00000 0%,#d10000 50%,#b00000 100%); /* W3C */
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#b00000', endColorstr='#b00000',GradientType=0 ); /* IE6-9 */
  }
  body.login {
    background: <?php echo get_option('ukmtheme_mn_color'); ?>;
  }
  .login form {
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
    border-radius: 3px;
  }
  </style>
<?php }
add_action( 'login_enqueue_scripts', 'ukmtheme_login_logo' );

function ukmtheme_login_logo_url() {
  return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'ukmtheme_login_logo_url' );

function ukmtheme_login_logo_url_title() {
  return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'ukmtheme_login_logo_url_title' );

?>