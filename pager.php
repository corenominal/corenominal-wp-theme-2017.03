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
?>
<?php
// FIXME: This needs some work. Think about using "get_next_posts_link"
// and styling like <a rel="next" title="Next" href="?start=20">Older »</a>
?>
<?php if( get_next_posts_link() || get_previous_posts_link() ): ?>
	<div class="pager">
		<?php next_posts_link( '&#x25C0; Older' ) ?>
		<?php previous_posts_link( 'Newer &#x25BA;' ) ?>
	</div>
<?php endif; ?>
