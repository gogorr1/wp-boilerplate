<?php

/**
 * The login-specific functionality.
 * 
 * @since      1.0.0
 *
 * @package    Aaa
 */

/**
 * The login-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Aaa
 */
namespace Inf_Theme\Admin;

use Inf_Theme\Theme\Theme_Options as Theme_Options;

class Acf {

  protected $theme_name;

  protected $theme_version;

  protected $assets_version;
  
    /**
   * Init call
   */
  public function __construct( $theme_info = null ) {
    $this->theme_name = $theme_info['theme_name'];
    $this->theme_version = $theme_info['theme_version'];
    $this->assets_version = $theme_info['assets_version'];
  }

 /**
   * Add new toolbar to the ACF WYSIWYG editor
   *
   * @param  array $toolbars Existing toolbars.
   * @return array           Modified toolbars.
   */
  public function add_wysiwyg_toolbars( $toolbars ) {

    // Add a new toolbar called "Very Simple".
    $toolbars['Very Simple'] = array();
    $toolbars['Very Simple'][1] = array( 'bold', 'italic', 'underline', 'formatselect' );

    $key = array_search( 'code', $toolbars['Full'][2], true );

    if ( $key !== false ) {
      unset( $toolbars['Full'][2][ $key ] );
    }

    return $toolbars;
  }

  /**
   * Add Google Maps API key from admin
   *
   * @param array $api ACF map api.
   * @return string
   */
  public function set_google_map_api_key( $api ) {

    $theme_options_general = new Theme_Options\Theme_Options_General();

    $api['key'] = $theme_options_general->get_theme_option( 'google_maps_api_key' );

    return $api;
  }

}