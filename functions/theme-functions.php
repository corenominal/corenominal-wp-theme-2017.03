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

// Format and spit tags
function corenominal_spit_tags( $tags )
{
	$data = '';
	if ( $tags ):
      
      foreach( $tags as $tag ):
    
        $data .= '<a rel="tag" class="p-category" href="/tag/' . $tag->slug . '/">' . $tag->name . '</a> ';

      endforeach;

    endif;

    return $data;
}

// Format and spit snippet languages
function corenominal_spit_languages( $postid )
{
	$languages = get_the_terms( $postid, 'snippet_language');

	$data = '';
	if ( $languages ):

	foreach( $languages as $luanguage ):

	$data .= '<a rel="tag" class="p-category" href="/snippet_language/' . $luanguage->slug . '/">' . $luanguage->name . '</a> ';

	endforeach;

	endif;

	return $data;
}

// Custom 404 page title
function theme_slug_filter_wp_title( $title )
{
    if ( is_404() )
    {
        $title = 'Lost in Cyberspace - 404 | ';
    }
    return $title;
}
add_filter( 'wp_title', 'theme_slug_filter_wp_title' );

// Add classes to pager links
function corenominal_next_pager_link()
{
    return 'class="next-page"';
}
add_filter('next_posts_link_attributes', 'corenominal_next_pager_link');

function corenominal_prev_pager_link()
{
    return 'class="prev-page"';
}
add_filter('previous_posts_link_attributes', 'corenominal_prev_pager_link');

// Custom excerpt lengths
function corenominal_custom_excerpt($limit)
{
    return wp_trim_words(get_the_excerpt(), $limit);
}
