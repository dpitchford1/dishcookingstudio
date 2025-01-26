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

<link rel="stylesheet" href="/assets/css/core/dish-inline-head.css" media="all">
<link rel="stylesheet" href="/assets/css/core/dish-icon-system.css" media="all">

<link rel="stylesheet" href="/assets/css/resources/style.css" media="all">
<link rel="stylesheet" href="/assets/css/resources/plugins.min.css" media="all">
<!-- <link rel="stylesheet" href="/assets/css/resources/dish-icons.min.css" media="all"> -->

<?php wp_head(); ?>
<link rel="stylesheet" href="/assets/css/resources/updates.min.css" media="all">
<link rel="stylesheet" href="/assets/css/resources/wc.min.css" media="all">
</head>
<?php flush(); ?>

<body <?php body_class(); ?> data-off-screen="hidden" id="page-body" data-theme="dark">
<?php wp_body_open(); ?>
<!-- <a href="#global-header" id="exit-off-canvas" class="exit-offcanvas" aria-controls="global-header"><span class="hide-text">Hide Menu</span></a> -->
<?php /* accessibility nav */ ?>
<a class="quick-links" href="#main-content">Skip to Main Content</a>
<a class="quick-links" href="#global-footer">Skip to Footer</a>

<?php // do_action( 'dish_before_site' ); ?>
<?php // do_action( 'dish_before_header' ); ?>
<?php if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { ?>
        <?php echo '<span class="small-text" style="font-size: 12px">* Current template: ' . get_current_template() . ' *</span>'; ?>
        <?php } ?>
<header id="masthead" class="site-header" role="banner" style="<?php dish_header_styles(); ?>">
    <div class="fluid">

    <?php if ( is_front_page() ) : ?>
        <h1 class="brand brand-fs" id="logo" itemscope itemtype="http://schema.org/Organization"><span class="is--logo">Dish Cooking Studio</span></h1>
    <?php else : ?>
        <h1 class="brand brand-fs" id="logo" itemscope itemtype="http://schema.org/Organization"><a class="is--logo" href="/" rel="home">Dish Cooking Studio</a></h1>
    <?php endif ?>
    <!-- <p><button class="burger">Negative button</button><br>
<button class="burger burger--green">Green button</button><br>
<button class="burger burger--blue">Blue button</button></p> -->

    <?php
    /**
     * Functions hooked into dish_header action
     *
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

    </div><!-- #col-full -->
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
<div class="fluid cf">
    <!-- <div class="icons-testing">
        <h5>Icons in a list, no text</h5>
        <ul>
            <li><a class="is-icon i-lg is-icon--pins" href="">pin</a> - icon, in an anchor, lg size</li>
            <li><span class="is-icon i-lg is-icon--pins">pin</span> - icon, wrapped in span, lg size.</li>

            <li><a class="is-icon i-lg is-icon--pins" href="">pin - icon, in an anchor, lg size, pull text left</a> </li>

            <li><a class="has--pin is-icon--pins" href="">pin</a></li>
            <li><a class="has--pin is-icon--pins" href="">pin</a></li>
            <li><a class="has--pin is-icon--pins" href="">pin</a></li>
        </ul>

    </div> -->
    <?php
    do_action( 'dish_content_top' );
