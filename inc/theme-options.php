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
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_bg' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_languages' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_visitor_id' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_news' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_three' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_four' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_basic' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_custom' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_facebook' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_event' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_tabber' );
  register_setting( 'ukmtheme-settings-group', 'ukmtheme_widget_newsPortal' );
}

function theme_options_do_page() { ?>
<div class="wrap">
<h2><?php _e( 'Theme Options', 'ukmtheme' ); ?></h2>
<?php if( isset($_GET['settings-updated']) ) { ?>
  <div id="message" class="updated">
    <p><strong><?php _e('Settings saved.') ?></strong></p>
  </div>
<?php } ?>
<div class="postbox">
  <div class="inside">
  <p>Untuk menukar layout muka hadapan, anda boleh memilih jenis layout yang hendak digunakan di menu Appearance > Theme Options. Untuk templat grafik seperti logo, slideshow dan lain-lain boleh didapati <a href="<?php echo get_template_directory_uri(); ?>/assets/templates/templates.zip">di sini</a>.
  Gunakan perisian GIMP sebagai alternatif kepada perisian grafik dan boleh didapatkan di halaman berikut <a href="http://www.gimp.org/">www.gimp.org</a>.
  Sekiranya anda memerlukan khidmat bantuan pengendalian tema ini, anda boleh berhung terus dengan pembangun di alamat emel <em>jrajalu@ukm.edu.my</em>.<br/>Nota: Tema ini tidak semestinya memenuhi kehendak seperti yang anda mahukan.</p>
  </div>
</div>
<form method="post" action="options.php">
  <?php settings_fields( 'ukmtheme-settings-group' ); ?>
  <?php do_settings_sections( 'ukmtheme-settings-group' ); ?>
  <h3 class="title"><?php _e( 'General', 'ukmtheme' ); ?></h3>
  <p>Masukkan perincian di bawah mengikut keperluan.</p>
    <table class="form-table">
      <tbody>
        <tr valign="top">
          <th scope="row">
          <?php _e( 'Frontpage Layout', 'ukmtheme' ); ?><br/>
          <small><?php _e('Customize frontpage widget area','ukmtheme') ?></small>
          </th>

          <td>
            <?php
              $widget_news_scroller = get_option('ukmtheme_widget_news');
              $widget_three_box = get_option('ukmtheme_widget_three');
              $widget_four_box = get_option('ukmtheme_widget_four');
              $widget_basic = get_option('ukmtheme_widget_basic');
              $widget_custom = get_option('ukmtheme_widget_custom');
              $widget_facebook = get_option('ukmtheme_widget_facebook');
              $widget_event = get_option('ukmtheme_widget_event');
              $widget_tabber = get_option('ukmtheme_widget_tabber');
              $widget_news_portal = get_option('ukmtheme_widget_newsPortal');
            ?>
            <p class="description"><?php _e( 'Tandakan yang perlu sahaja. Sekiranya memilih "Custom", pastikan "Basic tidak dipilih". Untuk Facebook Like Box, masukkan url Facebook di ruangan Social Link.'); ?></p>
            <input id='checkbox' name='ukmtheme_widget_basic' type='checkbox' value="news" <?php echo ( 'news' == $widget_basic ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_basic"><?php _e( 'Basic', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_newsPortal' type='checkbox' value="news-portal" <?php echo ( 'news-portal' == $widget_news_portal ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_newsPortal"><?php _e( 'News Portal Widget', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_news' type='checkbox' value="news-scroller" <?php echo ( 'news-scroller' == $widget_news_scroller ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_news"><?php _e( 'News Scroller', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_three' type='checkbox' value="three-column" <?php echo ( 'three-column' == $widget_three_box ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_three"><?php _e( 'Three Column', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_four' type='checkbox' value="four-column" <?php echo ( 'four-column' == $widget_four_box ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_four"><?php _e( 'Four Column', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_event' type='checkbox' value="event-slider" <?php echo ( 'event-slider' == $widget_event ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_event"><?php _e( 'Event Slider', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_tabber' type='checkbox' value="tabber" <?php echo ( 'tabber' == $widget_tabber ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_tabber"><?php _e( 'Frontpage Tabber', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_custom' type='checkbox' value="custom" <?php echo ( 'custom' == $widget_custom ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_custom"><?php _e( 'Custom', 'ukmtheme' ); ?></label><br/>
            <input id='checkbox' name='ukmtheme_widget_facebook' type='checkbox' value="facebook" <?php echo ( 'facebook' == $widget_facebook ) ? 'checked="checked"' : ''; ?> />
            <label class="description" for="ukmtheme_widget_facebook"><?php _e( 'Facebook Like Box', 'ukmtheme' ); ?></label><br/>
          </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Visitor Counter ID','ukmtheme'); ?></th>
        <td>
        <input type="text" name="ukmtheme_visitor_id" value="<?php echo get_option('ukmtheme_visitor_id'); ?>" class="regular-text" placeholder="768059" />
        <p class="description"><a class="thickbox" href="<?php echo get_template_directory_uri(); ?>/assets/images/admin/site_counter_sample.png"><?php _e( 'View sample', 'ukmtheme' ); ?></a>
        &nbsp;|&nbsp;<?php _e( 'Generate your id', 'ukmtheme' ); ?>&nbsp;<a href="http://www.supercounters.com/hitcounter?tab=plugin-information&amp;plugin=simple-comment-editing&amp;TB_iframe=true&amp;width=830&amp;height=565" class="thickbox" title="www.supercounter.com">here</a></p>
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
          <input type="text" name="ukmtheme_mn_color" value="<?php if ( isset( $theme_one ) ) echo $theme_one; ?>" class="theme-one" data-default-color="#ed1c24" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Secondary','ukmtheme'); ?></th>
        <td>
          <input type="text" name="ukmtheme_snd_color" value="<?php if ( isset( $theme_two ) ) echo $theme_two; ?>" class="theme-two" data-default-color="#0095d9" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Tertiary','ukmtheme'); ?></th>
        <td>
          <input type="text" name="ukmtheme_trd_color" value="<?php if ( isset( $theme_three ) ) echo $theme_three; ?>" class="theme-three" data-default-color="#494949" />
        </td>
        </tr>
        <tr valign="top">
        <th scope="row"><?php _e('Background Image','ukmtheme'); ?></th>
        <td>
        <input type="text" name="ukmtheme_bg" value="<?php echo get_option('ukmtheme_bg'); ?>" class="regular-text" placeholder="http://www.example.com/image.png" />
        <p class="description"><?php _e( 'Image size should be 1920x530 pixels and in PNG format. To optimize the image, use TinyPNG <a href="https://tinypng.com/" target="_blank">here</a>.', 'ukmtheme' ); ?></p>
        </td>
        </tr>
      </tbody>
    </table>
    
<?php submit_button(); ?>

</form>
</div>
<?php } ?>