<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Headless_Theme
 */

// Assuming autoload or correct path inclusion for the TemplateTags class
use Inc\Base\TemplateTags;
?>

<?php 
// Instantiate the TemplateTags class
	$template_tags = new TemplateTags();
	$template_tags->headless_template('footer', 'template-parts/default-footer');
?>
	
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
