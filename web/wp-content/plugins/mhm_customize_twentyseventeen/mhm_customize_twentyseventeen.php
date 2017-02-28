<?php
/*
Plugin Name: Customize Twenty Seventeen
Plugin URI: https://www.frappant.ch/
Description: Development plugin only.
Author: Mark Howells-Mead
Version: 1.0
Author URI: https://www.markweb.ch/
Text Domain: mhm_customize_twentyseventeen
Domain Path: /languages
 */

namespace Frappant\MhmCustomizeTwentyseventeen;

class MhmCustomizeTwentyseventeen
{
    public $key = '';

    public function dump($var, $die = false)
    {
        echo '<pre>' . print_r($var, 1) . '</pre>';
        if ($die) {
            die();
        }
    }

    public function __construct()
    {
        add_action('wp_enqueue_scripts', array($this, 'addScripts'), 20);
    }
    public function addScripts()
    {
        wp_deregister_style('twentyseventeen-fonts');
        wp_deregister_style('twentyseventeen-style');
        wp_register_style('twentyseventeen-style', plugins_url('assets/dist/css/wcbrn.css', __FILE__));
    }
}

new MhmCustomizeTwentyseventeen();
