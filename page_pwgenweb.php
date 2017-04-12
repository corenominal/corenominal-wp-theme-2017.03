<?php /* Template Name: pwgenweb */
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

	<h1><a href="<?php echo site_url('projects') ?>">Project</a>: <?php the_title() ?></h1>

	<label class="label"> Password:
    <input type="text" id="password" class="full-width password" spellcheck="false">
    </label>

    <label class="label"> Number of characters:
        <select id="length">
            <?php
            for ($i=8; $i < 65; $i++)
            {
                echo '<option val="' . $i . '">' . $i . '</option>';
            }
            ?>
        </select>
    </label>
    
    <label class="label">
        <input id="capitalize" class="checkbox-custom" type="checkbox" checked>
        <span class="label-body checkbox-custom-label">Include at least one capital letter</span>
    </label>

    <label class="label">
        <input id="numerals" class="checkbox-custom" type="checkbox" checked>
        <span class="label-body checkbox-custom-label">Include at least one number</span>
    </label>

    <label class="label">
        <input id="symbols" class="checkbox-custom" type="checkbox" checked>
        <span class="label-body checkbox-custom-label">Include at least one special symbol</span>
    </label>

    <button id="generate" class="pwgen-button button button-primary">New Password</button> 
    <button id="copy" data-clipboard-target="#password" class="pwgen-button button button-primary">Copy to Clipboard</button>

    <div id="pwgen-notify" class="pwgen-notify"></div>

    <div class="about">
        <?php the_content() ?>
    </div>

<?php endwhile; ?>

<?php comments_template() ?>

</main>

<?php get_footer();
