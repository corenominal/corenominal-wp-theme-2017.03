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
function corenominal_enqueue_styles()
{
    // Default CSS
    wp_enqueue_style( 'sanitize_css', get_template_directory_uri() . '/css/vendor/sanitize.css', false );
    
    wp_enqueue_style( 'typography_css', get_template_directory_uri() . '/css/typography.css', false );
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/css/style.css', false );
    wp_enqueue_style( 'forms_css', get_template_directory_uri() . '/css/forms.css', false );
    wp_enqueue_style( 'layout_css', get_template_directory_uri() . '/css/layout.css', false );
    wp_enqueue_style( 'utilities_css', get_template_directory_uri() . '/css/utilities.css', false );

    // Conditional CSS
    if( is_page( 'projects' ) )
    {
        //wp_enqueue_style( 'page_projects_css', get_template_directory_uri() . '/css/page-projects.css', false );
    }

    if( is_page( 'archive' ) )
    {
        wp_enqueue_style( 'page_archive_css', get_template_directory_uri() . '/css/page-archive.css', false );
    }

    if( is_page( 'tag' ) )
    {
        wp_enqueue_style( 'page_tag_css', get_template_directory_uri() . '/css/page-tag.css', false );
    }

    if( is_page_template( 'page_project.php' ) )
    {
        wp_enqueue_style( 'page_projects_css', get_template_directory_uri() . '/css/page_project.css', false );
    }

    if( is_page( 'contact' ) )
    {
        //wp_enqueue_style( 'contact_css', get_template_directory_uri() . '/css/page-contact.css', false );
    }

    if( is_404() )
    {
        //wp_enqueue_style( '404', get_template_directory_uri() . '/css/404.css', false );
    }

    if( is_page_template( 'page_pwgenweb.php' ) )
    {
        wp_enqueue_style( 'pwgen_web_css', get_template_directory_uri() . '/css/page_pwgenweb.css', false );
    }

}
add_action( 'wp_enqueue_scripts', 'corenominal_enqueue_styles' );
