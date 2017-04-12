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
get_header();
?>

<main id="main" class="main" role="main"> <!-- All the important (seriously) stuff -->

<h1><a title="Browse all tags" href="/tag/">Tags</a>: <?php echo single_tag_title( '', false ) ?></h1>

<?php
while ( have_posts() ) :
	the_post();
	$categories = get_the_category();
	$category = $categories[0]->slug;
	require get_template_directory() . '/article_' . $category . '.php';
endwhile;
require get_template_directory() . '/pager.php';
?>

</main>

<?php get_footer();
