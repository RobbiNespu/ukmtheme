<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Creating_Options_Pages
 * @link http://themeshaper.com/2010/06/03/sample-theme-options/
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

add_action( 'admin_menu', 'ukmtheme_documentation_page_menu' );

function ukmtheme_documentation_page_menu() {
  add_theme_page( __('UKM Theme Documentation', 'ukmtheme'), __('Theme Docs','ukmtheme'), 'manage_options', 'ukmtheme-documentation', 'ukmtheme_documentation_options' );
}

function ukmtheme_documentation_options() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
} ?>
<div class="wrap">
<h2><?php _e( 'Documentations', 'ukmtheme' ); ?></h2>
  <div class="postbox">
    <div class="inside">
    <h3 class="title"><?php _e('Contents','ukmtheme') ?></h3>
    <ol>
      <li><a href="#Layout">Layout</a></li>
      <li><a href="#News">News</a></li>
      <li><a href="#Events">Events</a></li>  
      <li><a href="#FAQs">FAQs</a></li>
      <li><a href="#News Scroller">News Scroller</a></li>
      <li><a href="#Publication">Publication</a></li>
      <li><a href="#Slideshow">Slideshow</a></li>
      <li><a href="#Staff Directory">Staff Directory</a></li>
    </ol>
    <a name="Layout"><h4>Layout</h4></a>
    <p>Untuk menukar layout muka hadapan, anda boleh memilih jenis layout yang hendak digunakan di menu Appearance > Theme Options. Untuk templat grafik seperti logo, slideshow dah lain-lain boleh didapati <a href="<?php echo get_template_directory_uri(); ?>/assets/templates/templates.zip">di sini</a>.
    Gunakan perisian GIMP sebagai alternatif kepada perisian grafik dan boleh didapatkan di halaman berikut <a href="http://www.gimp.org/">www.gimp.org</a>.
    Sekiranya anda memerlukan khidmat bantuan pengendalian tema ini, anda boleh berhung terus dengan pembangun di alamat emel <em>jrajalu@ukm.edu.my</em>.<br/>Nota: Tema ini tidak semestinya memenuhi kehendak seperti yang anda mahukan.</p>
    </div>
  </div>
</div>
<?php } ?>