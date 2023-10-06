<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package dish
 */

?><!doctype html>
<html class="no-js" dir="ltr" <?php language_attributes(); ?> data-off-canvas="" id="site-body">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script>var doc = window.document; function addLoadEvent(b){var a=window.onload;if(typeof window.onload!=="function"){window.onload=b}else{window.onload=function(){a();b()}}}; doc.documentElement.className = document.documentElement.className.replace(/\bno-js\b/g, '') + 'has-js enhanced';</script>

<?php /* COPYRIGHTS */ ?>
<meta name="author" content="Dish Cooking Studio">
<meta name="copyright" content="© Dish Cooking Studio. All right reserved. 2023">
<?php /* SEARCH AND SEO */ ?>
<meta name="googlebot" content="NOODP">
<meta name="CCBot" content="nofollow">
<?php if ( is_front_page() ) : ?><link rel="home" title="Home page" href="/"><?php endif ?>

<?php wp_head(); ?>
</head>
<?php flush(); ?>

<body <?php body_class(); ?> data-off-screen="hidden" id="page-body" data-theme="dark">

<?php wp_body_open(); ?>

<?php do_action( 'dish_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'dish_before_header' ); ?>

	<header id="masthead" class="site-header" role="banner" style="<?php dish_header_styles(); ?>">

		<?php
		/**
		 * Functions hooked into dish_header action
		 *
		 * @hooked dish_header_container                 - 0
		 * @hooked dish_skip_links                       - 5
		 * @hooked dish_social_icons                     - 10
		 * @hooked dish_site_branding                    - 20
		 * @hooked dish_secondary_navigation             - 30
		 * @hooked dish_product_search                   - 40
		 * @hooked dish_header_container_close           - 41
		 * @hooked dish_primary_navigation_wrapper       - 42
		 * @hooked dish_primary_navigation               - 50
		 * @hooked dish_header_cart                      - 60
		 * @hooked dish_primary_navigation_wrapper_close - 68
		 */
		do_action( 'dish_header' );
		?>

	</header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to dish_before_content
	 *
	 * @hooked dish_header_widget_region - 10
	 * @hooked woocommerce_breadcrumb - 10
	 */
	do_action( 'dish_before_content' );
	?>

	<div id="content" class="site-content" tabindex="-1">
		<div class="col-full">

		<?php
		do_action( 'dish_content_top' );
