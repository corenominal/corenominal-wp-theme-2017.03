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
	
	<?php if( get_search_query() != '' ): ?>

		<h1>Search: "<?php the_search_query() ?>"</h1>
	
	<?php else: ?>
		
		<h1>Search</h1>
	
	<?php endif; ?>
	
	<form id="search-form" class="search-form" action="<?php echo site_url(); ?>" method="get">
		<input id="s" class="search-input" autocomplete="off" type="text" name="s" placeholder="Your query ..." value="<?php the_search_query() ?>">
	</form>

<?php
if ( get_search_query() != '' ):
	if ( have_posts() ):
		while ( have_posts() ):
			the_post();
?>

		<article class="h-entry post search-result">

			<h2>
			<a class="p-name u-url" href="<?php the_permalink() ?>"><?php the_title() ?></a>
			</h2>

			<h3 class="date">
			<time class="dt-published" datetime="<?php the_time( 'Y-m-d\TG:s:i' ) ?>"><?php the_time('F j, Y') ?> - <?php the_time() ?></time>
			</h3>
		  
			<div class="p-description">

		    	<p><?php echo corenominal_custom_excerpt( 20 ) ?></p>

		  	</div>

		</article>

		<?php endwhile; ?>

		<?php require get_template_directory() . '/pager.php';?>
		
	<?php else: ?>

	<p>No results for "<?php the_search_query() ?>" :(</p>

	<?php endif; ?>

<?php else: ?>
	
	<p>Enter your query and hit return to search.</p>

<?php endif; ?>


</main>

<?php get_footer();
