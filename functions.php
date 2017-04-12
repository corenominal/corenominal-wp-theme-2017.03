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

// Theme specific funtions
require get_template_directory() . '/functions/theme-functions.php';

// Custom taxonomies
require get_template_directory() . '/functions/taxonomies.php';

// Custom feeds
require get_template_directory() . '/functions/feeds.php';

// Comment walker
require get_template_directory() . '/functions/comment-walker.php';

// Custom admin metaboxes
require get_template_directory() . '/functions/metaboxes.php';

// Theme support for various features such as featured images
require get_template_directory() . '/functions/theme-support.php';

// Enqueue styles
require get_template_directory() . '/functions/enqueue-styles.php';

// Enqueue scripts
require get_template_directory() . '/functions/enqueue-scripts.php';
