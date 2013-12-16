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
    register_setting( 'ukmtheme-settings-group', 'ukmtheme_snd_color' );
    register_setting( 'ukmtheme-settings-group', 'ukmtheme_trd_color' );
}

function theme_options_do_page() { ?>
<div class="wrap">
<?php screen_icon(); echo "<h2>" . get_current_theme() . __( ' Options', 'ukmtheme' ) . "</h2>"; ?>

<form method="post" action="options.php">
    <?php settings_fields( 'ukmtheme-settings-group' ); ?>
    <?php do_settings_sections( 'ukmtheme-settings-group' ); ?>
    <h3 class="title"><?php _e( 'Social Links', 'ukmtheme' ); ?></h3>
    <p><?php _e( 'Pautan sosial UKM atau Jabatan UKM masing-masing', 'ukmtheme' ); ?></p>
    <table class="form-table">
        <tbody>
            <tr valign="top">
            <th scope="row">Facebook</th>
            <td><input type="text" name="ukmtheme_facebook" value="<?php echo get_option('ukmtheme_facebook'); ?>" class="regular-text" /></td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Twitter</th>
            <td><input type="text" name="ukmtheme_twitter" value="<?php echo get_option('ukmtheme_twitter'); ?>" class="regular-text" /></td>
            </tr>
            
            <tr valign="top">
            <th scope="row">Youtube</th>
            <td>
                <input type="text" name="ukmtheme_youtube" value="<?php echo get_option('ukmtheme_youtube'); ?>" class="regular-text" />
                <p class="description"><?php echo __( 'Enter full URL eg. http://www.twitter.com/ukmnewsportal', 'ukmtheme' ); ?></p>
            </td>
            </tr>
        </tbody>
    </table>
    <h3 class="title"><?php _e( 'Colour Option', 'ukmtheme' ); ?></h3>
    <p><?php _e( 'Colour option for colour switcher', 'ukmtheme' ); ?></p>
    <table class="form-table">
        <tbody>
            <tr valign="top">
            <th scope="row">Second Colour</th>
            <td><input type="text" name="ukmtheme_snd_color" value="<?php echo get_option('ukmtheme_snd_color'); ?>" class="regular-text" placeholder="#2896f3" /></td>
            </tr>
             
            <tr valign="top">
            <th scope="row">Third Colour</th>
            <td><input type="text" name="ukmtheme_trd_color" value="<?php echo get_option('ukmtheme_trd_color'); ?>" class="regular-text" placeholder="#efbf00" /><p class="description">Enter HTML colour code eg: #000000 or rgba(0,0,0,0). Generate your colour at <a href="http://www.colorpicker.com/">ColorPicker.com</a></p></td>
            </tr>
        </tbody>
    </table>
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>