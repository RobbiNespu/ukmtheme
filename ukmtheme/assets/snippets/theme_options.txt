<?php
/**
 * @link http://www.ukm.my/template
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

    //create new top-level menu
    add_menu_page('UKM Theme Options', 'Theme Options', 'administrator', __FILE__, 'ukmtheme_settings_page', get_stylesheet_directory_uri('stylesheet_directory')."/images/admin-menu-icon/icon-setting.png");
    
    //call register settings function
    add_action( 'admin_init', 'register_mysettings' );
}


function register_mysettings() {
	//register our settings
	register_setting( 'ukmtheme-settings-group', 'ukmtheme_facebook' );
	register_setting( 'ukmtheme-settings-group', 'ukmtheme_twitter' );
	register_setting( 'ukmtheme-settings-group', 'ukmtheme_youtube' );
}

function ukmtheme_settings_page() {
?>
<div class="wrap">
<h2>UKM Theme Options</h2>

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
    
    <?php submit_button(); ?>

</form>
</div>
<?php } ?>