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

<?php if( $wp_query->query_vars['paged'] === 0 ): ?>

	<address class="h-card bio">
	<!-- <a href="https://corenominal.org" class="u-url"><img class="u-photo" src="/images/photo-150.jpg" alt="corenominal" srcset="/images/photo-300.jpg 2x,/images/photo-600.jpg 4x"></a> -->
	<h1 class="p-name">corenominal</h1>
		<p class="p-note">Full stack <a href="https://corenominal.org/tag/web-development/">web developer</a> working at <a class="p-org" href="https://gelder.co.uk/">Gelder Group</a>, interested in <a href="https://corenominal.org/tag/">all the things</a>, but especially 
		<a href="https://corenominal.org/tag/html/">HTML</a>, 
		<a href="https://corenominal.org/tag/css/">CSS</a>, 
		<a href="https://corenominal.org/tag/javascript/">JavaScript</a>, 
		<a href="https://corenominal.org/tag/php/">PHP</a>, 
		<a href="https://corenominal.org/tag/wordpress/">WordPress</a>, 
		<a href="https://corenominal.org/tag/linux/">Linux</a>, &amp; 
		<a href="https://corenominal.org/tag/macos/">macOS</a>. 
		You can <a rel="me" class="u-url" href="https://twitter.com/corenominal">follow me here</a>. 
		You can <a class="u-email" href="mailto:corenominal@corenominal.org">get in touch here</a>.</p>
	</address>

<?php else: ?>

	<h1>Page: <?php echo $wp_query->query_vars['paged'] ?></h1>

<?php endif; ?>

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
