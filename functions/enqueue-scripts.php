<?php
if ( ! defined( 'WPINC' ) ) { die('Direct access prohibited!'); }
/**
 *                                             _             _
 *     ___ ___  _ __ ___ _ __   ___  _ __ ___ (_)_ __   __ _| |
 *    / __/ _ \| '__/ _ \ '_ \ / _ \| '_ ` _ \| | '_ \ / _` | |
 *   | (_| (_) | | |  __/ | | | (_) | | | | | | | | | | (_| | |
 *    \___\___/|_|  \___|_| |_|\___/|_| |_| |_|_|_| |_|\__,_|_|
 *
 *   Webmaster: Philip Newborough
 *   Contact: corenominal [at] corenominal.org
 *   Twitter: @corenominal
 *   From: Lincoln, United Kingdom
 */
function corenominal_enqueue_scripts()
{
    // Default JavaScript
    // wp_enqueue_script( 'modernizr_js', get_template_directory_uri() . '/js/vendor/modernizr-2.8.3.min.js', array(), false, false );
    wp_deregister_script( 'jquery' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'fitvids_js', get_template_directory_uri() . '/js/vendor/jquery.fitvids.js', array(), false, true );
    wp_enqueue_script( 'main_js', get_template_directory_uri() . '/js/main.js', array(), false, true );

    // Conditional JavaScript
    if( is_page( 'contact' ) )
    {
        //wp_enqueue_script( 'page-contact_js', get_template_directory_uri() . '/js/page-contact.js', array(), false, true );
    }

    if( is_404() )
    {
        //wp_enqueue_script( '404_js', get_template_directory_uri() . '/js/404.js', array(), false, true );
    }

    if( is_page_template( 'page_pwgenweb.php' ) )
    {
        wp_enqueue_script( 'clipboard_js', get_template_directory_uri() . '/js/vendor/clipboard.min.js', array(), false, true );
        wp_enqueue_script( 'js_cookie_js', get_template_directory_uri() . '/js/vendor/js.cookie.js', array(), false, true );
        wp_enqueue_script( 'page_pwgenweb_js', get_template_directory_uri() . '/js/page_pwgenweb.js', array(), false, true );
    }

}
add_action( 'wp_enqueue_scripts', 'corenominal_enqueue_scripts' );
