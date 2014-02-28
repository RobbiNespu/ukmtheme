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

// create custom plugin settings menu
add_action('admin_menu', 'ukmtheme_create_menu');

function ukmtheme_create_menu() {   
  // create theme option menu
  add_theme_page( __( 'Theme Options', 'ukmtheme' ), __( 'Theme Options', 'ukmtheme' ), 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
  
  // call register settings function
  add_action( 'admin_init', 'register_mysettings' );
}

function register_mysettings() {
  //register our settings
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_facebook' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_twitter' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_youtube' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_mn_color' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_snd_color' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_trd_color' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_languages' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_visitor_id' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_layout' );
}

function theme_options_do_page() { ?>
<div class="wrap">
<h2><?php _e( 'Theme Options', 'ukmtheme' ); ?></h2>
<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<form method="post" action="options.php">
  <?php settings_fields( 'ukmtheme-settings-group' ); ?>
  <?php do_settings_sections( 'ukmtheme-settings-group' ); ?>
  <h3 class="title"><?php _e( 'General', 'ukmtheme' ); ?></h3>
  <p>Masukkan perincian di bawah mengikut keperluan. Untuk templat grafik seperti logo, slideshow dah lain-lain boleh didapati <a href="<?php echo get_template_directory_uri(); ?>/assets/templates/templates.zip">di sini</a>.<br/>Gunakan perisian GIMP sebagai alternatif kepada perisian grafik dan boleh didapatkan di halaman berikut <a href="http://www.gimp.org/">www.gimp.org</a>.<br/>Sekiranya anda memerlukan khidmat bantuan pengendalian tema ini, anda boleh berhung terus dengan pembangun di alamat emel <em>jrajalu@ukm.edu.my</em>.<br/>Nota: Tema ini tidak semestinya memenuhi kehendak seperti yang anda mahukan.</p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
        <th scope="row"><?php _e('Visitor Counter ID','ukmtheme'); ?></th>
        <td>
        <input type="text" name="ukmtheme_visitor_id" value="<?php echo get_option('ukmtheme_visitor_id'); ?>" class="regular-text" placeholder="768059" />
        <p class="description"><?php _e( 'Generate your id here', 'ukmtheme' ); ?>&nbsp;<a href="http://www.supercounters.com/hitcounter" target="_blank">Supercounter</a></p>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Language Switcher','ukmtheme'); ?></th>
        <td>
          <select name ="ukmtheme_languages">
            <?php 
              $ut_lang_select = get_option('ukmtheme_languages'); 
            ?>
            <option value="canvas-tools" <?php if ($ut_lang_select=='canvas-tools') { echo 'selected'; } ?>>Disable</option>
            <option value="canvas-lang" <?php if ($ut_lang_select=='canvas-lang') { echo 'selected'; } ?>>Enable</option>
          </select>
          <p class="description"><?php _e( 'Enable language menu. Do not enable this feature if the "Polylang" plugin is not activated.', 'ukmtheme' ); ?></p>
        </td>
        </tr>
        <tr valign="top">
        <th scope="row">
        <?php _e('Frontpage Layout','ukmtheme'); ?><br/>
        <small><?php _e('Customize frontpage widget area','ukmtheme') ?></small>
        </th>
        <td>
          <select name ="ukmtheme_layout">
            <?php 
              $ut_layout = get_option('ukmtheme_layout'); 
            ?>
            <option value="default" <?php if ($ut_layout=='default') { echo 'selected'; } ?>>Basic</option>
            <option value="full-boxes" <?php if ($ut_layout=='full-boxes') { echo 'selected'; } ?>>Full Boxes</option>              
            <option value="three-boxes" <?php if ($ut_layout=='three-boxes') { echo 'selected'; } ?>>Basic with Three Boxes</option>
            <option value="four-boxes" <?php if ($ut_layout=='four-boxes') { echo 'selected'; } ?>>Basic with Four Boxes</option>
            <option value="three-boxes-only" <?php if ($ut_layout=='three-boxes-only') { echo 'selected'; } ?>>Three Boxes</option>
            <option value="four-boxes-only" <?php if ($ut_layout=='four-boxes-only') { echo 'selected'; } ?>>Four Boxes</option>
            <option value="three-four-boxes" <?php if ($ut_layout=='three-four-boxes') { echo 'selected'; } ?>>Three and Four Boxes</option>                    
            <option value="full-boxes-scroller" <?php if ($ut_layout=='full-boxes-scroller') { echo 'selected'; } ?>>Full Boxes with News Scroller</option>
            <option value="three-boxes-scroller" <?php if ($ut_layout=='three-boxes-scroller') { echo 'selected'; } ?>>Three Boxes with News Scroller</option>
            <option value="four-boxes-scroller" <?php if ($ut_layout=='four-boxes-scroller') { echo 'selected'; } ?>>Four Boxes with News Scroller</option>
          </select>
        </td>
        </tr>
      </tbody>
    </table>
    <h3 class="title"><?php _e( 'Social Links', 'ukmtheme' ); ?></h3>
    <p><?php _e( 'Pautan capaian ke laman Facebook, Twitter dan Youtube rasmi UKM atau PTJ. Masukkan url lengkap seperti keterangan di bawah.', 'ukmtheme' ); ?></p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
        <th scope="row">Facebook</th>
        <td><input type="text" name="ukmtheme_facebook" value="<?php echo get_option('ukmtheme_facebook'); ?>" class="regular-text" placeholder="https://www.facebook.com/ptmukm" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Twitter</th>
        <td><input type="text" name="ukmtheme_twitter" value="<?php echo get_option('ukmtheme_twitter'); ?>" class="regular-text" placeholder="https://www.twitter.com/ptmukm" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Youtube</th>
        <td>
          <input type="text" name="ukmtheme_youtube" value="<?php echo get_option('ukmtheme_youtube'); ?>" class="regular-text" placeholder="http://www.youtube.com/user/ptmukm" />
          <p class="description"><?php _e( 'Enter full url e.g: https://www.twitter.com/ukmnewsportal', 'ukmtheme' ); ?></p>
        </td>
        </tr>
      </tbody>
    </table>
    <h3 class="title"><?php _e( 'Colour Options', 'ukmtheme' ); ?></h3>
    <p><?php _e( 'Colour option for style switcher.', 'ukmtheme' ); ?></p>
    <table class="form-table">
      <tbody>

      <?php $theme_one = get_option('ukmtheme_mn_color'); ?>
      <?php $theme_two = get_option('ukmtheme_snd_color'); ?>
      <?php $theme_three = get_option('ukmtheme_trd_color'); ?>

        <tr valign="top">
        <th scope="row"><?php _e('Primary','ukmtheme'); ?></th>
        <td>
          <input type="text" name="ukmtheme_mn_color" value="<?php if ( isset( $theme_one ) ) echo $theme_one; ?>" class="theme-one" data-default-color="#d10000" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Secondary','ukmtheme'); ?></th>
        <td>
          <input type="text" name="ukmtheme_snd_color" value="<?php if ( isset( $theme_two ) ) echo $theme_two; ?>" class="theme-two" data-default-color="#0050a0" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Tertiary','ukmtheme'); ?></th>
        <td>
          <input type="text" name="ukmtheme_trd_color" value="<?php if ( isset( $theme_three ) ) echo $theme_three; ?>" class="theme-three" data-default-color="#494949" />
        </td>
        </tr>
      </tbody>
    </table>
    
<?php submit_button(); ?>

</form>
</div>
<?php } ?>