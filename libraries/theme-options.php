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
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_annc_head' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_facebook' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_twitter' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_youtube' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_snd_color' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_snd_color_nav' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_trd_color' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_trd_color_nav' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_front_slideshow' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_languages' );
}

function theme_options_do_page() { ?>
<div class="wrap">
<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', 'ukmtheme' ) . "</h2>"; ?>
<?php if( isset($_GET['settings-updated']) ) { ?>
    <div id="message" class="updated">
        <p><strong><?php _e('Settings saved.') ?></strong></p>
    </div>
<?php } ?>
<form method="post" action="options.php">
  <?php settings_fields( 'ukmtheme-settings-group' ); ?>
  <?php do_settings_sections( 'ukmtheme-settings-group' ); ?>
  <h3 class="title"><?php _e( 'General', 'ukmtheme' ); ?></h3>
  <p><?php _e( 'News Heading, Slideshow and Languages', 'ukmtheme' ); ?></p>
    <table class="form-table">
      <tbody>
          <tr valign="top">
          <th scope="row">News Heading</th>
          <td><input type="text" name="ukmtheme_annc_head" value="<?php echo get_option('ukmtheme_annc_head'); ?>" class="regular-text" placeholder="Latest News" /></td>
          </tr>
          <tr valign="top">
          <th scope="row">Image Slideshow</th>
          <td>
            <select name ="ukmtheme_front_slideshow">
              <?php $ut_slides = get_option('ukmtheme_front_slideshow'); ?>
              <option value="rslides" <?php if ($ut_slides=='rslides') { echo 'selected'; } ?>>Default</option>
              <option value="bxslider" <?php if ($ut_slides=='bxslider') { echo 'selected'; } ?>>BX Slider</option>
              <option value="carouFredSel" <?php if ($ut_slides=='carouFredSel') { echo 'selected'; } ?>>CarouFredSel</option>
              <option value="nivoSlider" <?php if ($ut_slides=='nivoSlider') { echo 'selected'; } ?>>Nivo Slider</option>
            </select>
            <p class="description"><?php _e( 'Untuk &quot;CarouFredSel&quot;, pastikan minima lima imej dimuat naik.', 'ukmtheme' ); ?></p>
          </td>
          </tr>
          <tr valign="top">
          <th scope="row">Language Switcher</th>
          <td>
            <select name ="ukmtheme_languages">
              <?php 
                $ut_lang_select = get_option('ukmtheme_languages'); 
              ?>
              <option value="tools" <?php if ($ut_lang_select=='tools') { echo 'selected'; } ?>>Disable</option>
              <option value="tools-dropdown" <?php if ($ut_lang_select=='tools-dropdown') { echo 'selected'; } ?>>Enable</option>
            </select>
            <p class="description"><?php _e( 'Enable language menu', 'ukmtheme' ); ?></p>
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
          <p class="description"><?php echo __( 'Masukkan url lengkap cth: https://www.twitter.com/ukmnewsportal', 'ukmtheme' ); ?></p>
        </td>
        </tr>
      </tbody>
    </table>
    <h3 class="title"><?php _e( 'Colour Options', 'ukmtheme' ); ?></h3>
    <p><?php _e( 'Colour option for colour switcher', 'ukmtheme' ); ?></p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
        <th scope="row">2nd Colour</th>
        <td><input type="text" name="ukmtheme_snd_color" value="<?php echo get_option('ukmtheme_snd_color'); ?>" class="regular-text" placeholder="#1075FF" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">2nd Colour Dark</th>
        <td><input type="text" name="ukmtheme_snd_color_nav" value="<?php echo get_option('ukmtheme_snd_color_nav'); ?>" class="regular-text" placeholder="#006AFA" /></td>
        </tr>        
        <tr valign="top">
        <th scope="row">3rd Colour</th>
        <td><input type="text" name="ukmtheme_trd_color" value="<?php echo get_option('ukmtheme_trd_color'); ?>" class="regular-text" placeholder="#1F1E1E" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">3rd Colour Dark</th>
        <td><input type="text" name="ukmtheme_trd_color_nav" value="<?php echo get_option('ukmtheme_trd_color_nav'); ?>" class="regular-text" placeholder="#151515" /><p class="description">Masukkan kod hex warna cth: #000000 atau rgb(255, 0, 0). Kod hex warna boleh dijana di laman berikut <a href="http://www.colorpicker.com/">ColorPicker.com</a></p></td>
        </tr>
      </tbody>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>