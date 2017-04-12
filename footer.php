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

<footer id="contentinfo" class="contentinfo" role="contentinfo"> 
    <p>&copy; Copyright <?php echo date( 'Y' ) ?> Philip Newborough</p>
</footer>

<?php wp_footer() ?>

<script type="application/ld+json">
[{ "@context" : "http://schema.org",
  "@type" : "Organization",
  "name" : "corenominal",
  "url" : "https://corenominal.org",
  "logo": "https://corenominal.org/logo.png",
  "sameAs" : [ "http://www.facebook.com/corenominal",
    "http://www.twitter.com/corenominal",
    "https://plus.google.com/+PhilipNewborough",
    "https://github.com/corenominal",
    "https://codepen.io/corenominal",
    "https://uk.linkedin.com/in/corenominal",
    "https://www.reddit.com/user/corenominal"]
},
{
   "@context": "http://schema.org",
   "@type": "WebSite",
   "url": "https://corenominal.org/",
   "potentialAction": {
     "@type": "SearchAction",
     "target": "https://corenominal.org/?s={search_term_string}",
     "query-input": "required name=search_term_string"
   }
}]
</script>
</body>
</html>