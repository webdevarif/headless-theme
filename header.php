<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Headless_Theme
 */
// Assuming autoload or correct path inclusion for the TemplateTags class
use Inc\Base\TemplateTags;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'headless-theme' ); ?></a>

<?php 
// Instantiate the TemplateTags class
	$template_tags = new TemplateTags();

	// Call the headless_template method with appropriate arguments
	// Replace 'header' and 'template-parts/content' with actual parameters
	$template_tags->headless_template('header', 'template-parts/default-header');
?>

