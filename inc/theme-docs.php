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
  <div class="metabox-holder">
    <div class="postbox">
      <h3 class="hndle"><span>Pengenalan</span></h3>
      <div class="inside">
      <p>Tema WordPress ini adalah percuma dan boleh digunakan oleh semua Fakulti/Institut/Jabatan/Pusat di Universiti Kebangsaan Malaysia (UKM). Penggunaan secara peribadi atau kumpulan (Persatuan/Kelab) oleh warga UKM amat digalakkan. Penggunaan oleh pihak luar hendaklah merujuk terma-terma yang dinyatakan pada lesen <a href="http://creativecommons.org/licenses/by/4.0/">CC BY 4.0</a></p>
      </div>
    </div>
    <div class="postbox">
      <h3 class="hndle"><span>Mengubah Logo</span></h3>
      <div class="inside">
        <p>Untuk menukar logo di bahagian Header, muat turun template <a href="<?php echo get_template_directory_uri(); ?>/assets/psd/logo_ukm.psd">di sini</a>. Gunakan perisian Photoshop untuk mengubah nama pada header. Untuk akses percuma untuk mengubah grafik tersebut anda boleh menggunakan perisian Pixlr di capaian berikut <a href="http://apps.pixlr.com/editor/" target="_blank">apps.pixlr.com/editor/</a>.</p>
        <img style="display:block;width:100%;max-width:641px;" src="<?php echo get_template_directory_uri(); ?>/assets/images/public/pixlr-sample.png" alt="Pixlr">
        <ol>
          <li>Simpan imej ke format PNG</li>
          <li>Pergi ke bahagian Appearance > Header, kemudian pilih fail yang ingin dimuat naik</li>
          <li>Klik pada butang "Save Changes"</li>
        </ol>
      </div>
    </div>
  </div><!-- .metabox-holder -->
  </div><!-- .wrap -->

<?php } ?>