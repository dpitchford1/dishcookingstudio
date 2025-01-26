<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package dish
 */

if ( ! is_active_sidebar( 'sidebar-classes' ) ) {
	return;
}
?>
<div id="secondary" class="widget-area" role="complementary">
    <h3>More from Dish</h3>

    <?php // echo do_shortcode('[em_performers]') ?>

    <!-- <div class="widget widget_featured_performers ep-widgets">
        <div class="widget-content">
            <h2 class="widget-title subheading heading-size-3">The Dish Chefsss</h2>
            <div class="ep-popular-performer ep-mw-wrap ep-widget-block-wrap ep-d-flex ep-align-items-center ep-p-2 ep-my-3 ep-shadow-sm ep-border ep-rounded-1 ep-bg-white">
                <div class="ep-fimage ep-di-flex">
                    <a href="https://dishcookingstudio.local/chef/erin-ross/"><img src="https://dishcookingstudio.local/wp-content/uploads/staff/1655743075810.jpg" alt="Event Venue Image" data-src="https://dishcookingstudio.local/wp-content/uploads/staff/1655743075810.jpg" decoding="async" class=" ls-is-cached lazyloaded" data-eio-rwidth="200" data-eio-rheight="200"><noscript><img src="https://dishcookingstudio.local/wp-content/uploads/staff/1655743075810.jpg" alt="Event Venue Image" data-eio="l"></noscript></a>
                </div>
                <div class="ep-fdata">
                    <div class="ep-fname">
                        <a href="https://dishcookingstudio.local/chef/erin-ross/">Erin Ross</a>
                    </div>
                    <div class="ep-performer-role ep-text-small ep-text-muted">Instructor / Personal Chef</div>
                </div>
            </div>
            <div class="ep-popular-performer ep-mw-wrap ep-widget-block-wrap ep-d-flex ep-align-items-center ep-p-2 ep-my-3 ep-shadow-sm ep-border ep-rounded-1 ep-bg-white">
                <div class="ep-fimage ep-di-flex">
                    <a href="https://dishcookingstudio.local/chef/cat-mostazo/"><img src="https://dishcookingstudio.local/wp-content/uploads/staff/CatMostazoHeadshot-787x1024.jpeg" alt="Event Venue Image" data-src="https://dishcookingstudio.local/wp-content/uploads/staff/CatMostazoHeadshot-787x1024.jpeg" decoding="async" class=" ls-is-cached lazyloaded" data-eio-rwidth="787" data-eio-rheight="1024"><noscript><img src="https://dishcookingstudio.local/wp-content/uploads/staff/CatMostazoHeadshot-787x1024.jpeg" alt="Event Venue Image" data-eio="l"></noscript></a>
                </div>
                <div class="ep-fdata">
                    <div class="ep-fname">
                        <a href="https://dishcookingstudio.local/chef/cat-mostazo/">Cat Mostazo</a>
                    </div>
                    <div class="ep-performer-role ep-text-small ep-text-muted">Chef / Culinary Instructor</div>
                </div>
            </div>
        </div>
    </div> -->

	<?php dynamic_sidebar( 'sidebar-classes' ); ?>
</div><!-- #secondary -->
