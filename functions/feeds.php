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

/**
 * Custom RSS feed: posts within the last week,
 * for "corenominal WEEKLY" newsletter
 */
function corenominal_weekly_RSS()
{
	add_feed('corenominalweekly', 'corenominal_weekly_RSS_callback');
}
add_action('init', 'corenominal_weekly_RSS');

function corenominal_weekly_RSS_callback()
{
	get_template_part('rss', 'corenominalweekly');
}
