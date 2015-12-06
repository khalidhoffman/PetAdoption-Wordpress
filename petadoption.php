<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              https://github.com/cforlando
 * @since             1.0.0
 * @package           Cforlando Pet Adoptions
 *
 * @wordpress-plugin
 * Plugin Name:       Cforlando Pet Adoptions
 * Plugin URI:        https://github.com/cforlando
 * Description:       Cforlando plugin to aid in the adoption of pets
 * Version:           1.0.0
 * Author:            cforlando
 * Author URI:        https://github.com/cforlando
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Cforlando Pet Adoptions
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
  die;
}
$plugin_dir = plugin_dir_path( __FILE__ );
// Activate Admin
add_action('admin_menu', 'petadoption_plugin_create_menu');

function petadoption_plugin_create_menu() {

  //create new top-level menu
  add_menu_page('Petadoption Plugin Settings', 'Petadoption Settings', 'administrator', __FILE__, 'petadoption_plugin_settings_page');

  //call register settings function
  add_action( 'admin_init', 'register_petadoption_plugin_settings' );
}


function register_petadoption_plugin_settings() {
  //register settings
  register_setting( 'petadoption-plugin-settings-group', 'petadoption' );
  register_setting( 'petadoption-plugin-settings-group', 'appid' );
  register_setting( 'petadoption-plugin-settings-group', 'restapikey' );
}

function petadoption_plugin_settings_page() {
?>
<div class="wrap">
<h2>CodeForOrlando Shortcodes and Filters</h2>

  <form method="post" action="options.php">
      <?php settings_fields( 'petadoption-plugin-settings-group' ); ?>
      <?php do_settings_sections( 'petadoption-plugin-settings-group' ); ?>
      <table class="form-table">
          <tr valign="top">
          <th scope="row">Activate Pet Adoption Shortcode</th>
          <td><input type="checkbox" name="petadoption" value="1" <?php checked('1', get_option('petadoption') ); ?> /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Parse-Application-Id</th>
            <td><input type="text" name="appid" value="<?php echo get_option('appid'); ?>" /></td>
          </tr>
          <tr valign="top">
            <th scope="row">Parse-REST-API-Key</th>
            <td><input type="text" name="restapikey" value="<?php echo get_option('restapikey'); ?>" /></td>
          </tr>
      </table>

      <?php submit_button(); ?>

    <!-- Admin Messages -->
    <?php

      if( get_option('petadoption') === '1') {
        echo '<div><p>Pet Adoption Plugin Activated</p></div>';
      }

    ?>

    <script type="text/javascript">
      var apikey = <?php echo json_encode($apikey); ?>;
      var restapikey = <?php echo json_encode($restapikey); ?>;
    </script>

  </form>
</div>
<?php } ?>

<?php
  require_once plugin_dir_path( __FILE__ ) . 'includes/petadoption-shortcode.php';

  /*==========================================
  =            Styles and Scripts            =
  ==========================================*/
  if( get_option('petadoption') === '1') {
    function petadoption_scripts() {
      $params = array(
        "apikey" => get_option('appid'),
        "restapikey" => get_option('restapikey')
      );
      //$apikey = get_option('appid');
      //$restapikey = get_option('restapikey');
      wp_enqueue_script(
        'app',
        plugins_url( '/public/js/app.js' , __FILE__ ),
        array( 'jquery' )
      );
      wp_localize_script('app', 'parse', $params);
    }

    add_action( 'wp_enqueue_scripts', 'petadoption_scripts' );
  }


?>