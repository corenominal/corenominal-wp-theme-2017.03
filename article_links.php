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

<?php $the_link = get_post_custom_values('the_link', $post->ID) ?>

<?php 
// Single page use
// ---------------
if( is_single() ):
?>
<div class="xfolkentry h-entry post link">
  
  <div class="e-content">
    
    <h1 class="p-name">
      <a class="taggedlink u-bookmark-of" href="<?php echo $the_link[0] ?>"><?php the_title() ?> <span>[&nearr;]</span></a>
    </h1>

    <h2 class="date">
    <time class="dt-published" datetime="<?php the_time( 'Y-m-d\TG:s:i' ) ?>"><?php the_time('F j, Y') ?> - <?php the_time() ?></time>
    </h2>

    <?php the_content() ?>

  </div>

  <p class="meta top">Tagged with: <?php echo corenominal_spit_tags( get_the_tags() ) ?></p>

</div>

<?php
// Archive page use
// ----------------
else:
?>

<article class="xfolkentry h-entry post link">
  
  <div class="e-content">
    
    <h2>
      <a class="taggedlink p-name u-bookmark-of" href="<?php echo $the_link[0] ?>"><?php the_title() ?> <span>[&nearr;]</span></a>
    </h2>

    <h3 class="date">
      <a title="permalink" rel="bookmark" class="u-url" href="<?php the_permalink() ?>">
        <time class="dt-published" datetime="<?php the_time( 'Y-m-d\TG:s:i' ) ?>"><?php the_time('F j, Y') ?> - <?php the_time() ?></time>
      </a>
    </h3>

    <?php the_content() ?>

  </div>

  <footer>
    
    <p class="meta top">Tagged with: <?php echo corenominal_spit_tags( get_the_tags() ) ?></p>

  </footer>

</article>

<?php endif; ?>
