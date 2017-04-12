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

<main id="main" class="main archive" role="main"> <!-- All the important (seriously) stuff -->

<?php
while ( have_posts() ) :
	the_post();
?>

	<h1>Archive</h1>

	<input id="filter-archives" autocomplete="off" class="search-input archives" type="text" value="" placeholder="Filter ...">

	<?php
	// WP_Query arguments
	$args = array (
		'posts_per_page'         => '-1',
		'order'                  => 'DESC',
		'orderby'                => 'date',
	);
	$query = new WP_Query( $args );

	$date = false;
	$first = true;
	?>

	<ul class="month">
	
	<?php
	while ( $query->have_posts() ):
		$query->the_post();
		// do something
		if( $date != get_the_time('F, Y') )
		{
			if( $first ):
				$first = false;
				$date = get_the_time('F, Y');
				echo '<li class="date"><h2>'.$date.'</h2></li>';
			else:
				echo '</ul>';
				echo '<ul class="month">';
				$date = get_the_time('F, Y');
				echo '<li class="date"><h2>'.$date.'</h2></li>';
			endif;

		}
	?>

		<li class="title">
			<span><?php the_time('d') ?></span>
			<a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
		</li>
		
	<?php endwhile; ?>
	
	</ul>
	<div id="no-results"></div>

	<?php wp_reset_postdata(); ?>

<?php endwhile; ?>

</main>

<?php get_footer();
