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
        add_action('wp_enqueue_scripts', array($this, 'enqueue'), 10);
        add_action('wp_enqueue_scripts', array($this, 'dequeue'), 20);
    }

    public function dequeue()
    {
        wp_deregister_style('twentyseventeen-fonts');
    }

    public function enqueue()
    {
        wp_enqueue_style('wcbrn', plugins_url('Foundation/dist/assets/css/app.css', __FILE__), array('twentyseventeen-style'));
    }
}

new MhmCustomizeTwentyseventeen();
