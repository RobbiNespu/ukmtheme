<?php
/**
 * @link http://www.ukm.my/template
 * @link http://codex.wordpress.org/Creating_Options_Pages
 * @link http://themeshaper.com/2010/06/03/sample-theme-options/
 * @link http://codex.wordpress.org/Adding_Administration_Menus
 *
 * @package WordPress
 * @subpackage ukmtheme
 * @since 4.0
 *
 * @author Jamaludin Rajalu
 */

add_action( 'admin_menu', 'ut_theme_docs_menu' );

function ut_theme_docs_menu() {
  add_theme_page( 'Theme Docs', 'Theme Docs', 'manage_options', 'ut_theme_docs_page', 'ut_theme_docs' );
}

function ut_theme_docs() {
  if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
  } ?>

  <div class="wrap">
  <h2><?php _e( 'Theme Docs', 'ukmtheme' ); ?></h2>
    <div class="postbox">
      <div class="inside">
      <p>Untuk menukar layout muka hadapan, anda boleh memilih jenis layout yang hendak digunakan di menu Appearance > Theme Options. Untuk templat grafik seperti logo, slideshow dan lain-lain boleh didapati <a href="<?php echo get_template_directory_uri(); ?>/assets/templates/templates.zip">di sini</a>.
      Gunakan perisian GIMP sebagai alternatif kepada perisian grafik dan boleh didapatkan di halaman berikut <a href="http://www.gimp.org/">www.gimp.org</a>.
      Sekiranya anda memerlukan khidmat bantuan pengendalian tema ini, anda boleh berhung terus dengan pembangun di alamat emel <em>jrajalu@ukm.edu.my</em>.<br/>Nota: Tema ini tidak semestinya memenuhi kehendak seperti yang anda mahukan.</p>
      </div>
    </div>
    <h3 class="title"><?php _e( 'Header Logo', 'ukmtheme' ); ?></h3>
    <div class="postbox">
      <div class="inside">
        <p>Untuk menukar logo di bahagian Header, muat turun template <a href="<?php echo get_template_directory_uri(); ?>/assets/templates/templates.zip">di sini</a></p>
      </div>
    </div>
  </div><!-- .wrap -->

<?php } ?>