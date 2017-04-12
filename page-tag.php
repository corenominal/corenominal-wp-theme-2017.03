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

<?php
while ( have_posts() ) :
	the_post();
?>

	<h1>Tags</h1>

	<div class="description">
	<?php the_content() ?>
	</div>

	<input id="filter-tags" autocomplete="off" class="search-input tags" type="text" value="" placeholder="Filter ...">

	<ul class="tags">

	<?php
	$args = array( 'order' => 'ASC', 'hide_empty' => true );
	$tags = get_tags( $args );
	foreach ($tags as $tag):
	?>

		<li class="tag">
			<a rel="tag" class="p-category nowrap" href="<?php echo site_url( 'tag/' . $tag->slug ) ?>"><?php echo $tag->name ?></a>
		</li>

	<?php endforeach; ?>
	
	</ul>


<?php endwhile; ?>

</main>

<?php get_footer();
