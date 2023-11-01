<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package dish
 */

?>
</div><!-- .col-full -->


<?php do_action( 'dish_before_footer' ); ?>

<!-- start footer -->
<div class="region global-footer cf" id="global-footer">
    <footer class="fluid brand-footer cf" role="contentinfo">
        <h3 class="hide-text screen-reader-text">Additional Information</h3>

        <section class="footer-layout ra" itemscope itemtype="http://schema.org/LocalBusiness">
            <div class="logo item">
                <div class="footer-logo"></div>
                <h4 class="xsm--m footer--heading">Find Us Online!</h4>
                <ul class="inline-list footer-social" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                    <li itemprop="name"><a class="is-circle" href="http://www.facebook.com/dishcookingstudio/" rel="external me" itemprop="url" target="blank"><span class="ico i-m i--fb">Facebook</span></a></li>
                    <li itemprop="name"><a class="is-circle" href="https://www.instagram.com/dishcookingstudio/" rel="external me" itemprop="url" target="blank"><span class="ico i-m i--ig">Instagram</span></a></li>
                    <!-- <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-m i--pt">Pinterest</span></a></li> -->
                    <li itemprop="name"><a class="is-circle" href="https://twitter.com/dish_cooking" rel="external me" itemprop="url" target="blank"><span class="ico i-m i--tw">Twitter</span></a></li>
                    <!-- <li itemprop="name"><a class="is-circle" href="#" rel="external me" itemprop="url" target="blank"><span class="ico i-m i--yt">Youtube</span></a></li> -->
                </ul>
            </div>
            <div class="desc item">
                <h4 class="hide-text screen-reader-text">About Dish Cooking Studio</h4>
                <p class="sm--m footer--heading">The best Cooking Class Experience in Toronto!</p>
                <p class="footer-excerpt">We're creating a holistic food experience - one that is thoughtful, helpful and flavourful. By giving people the opportunity to cook, eat and shop under one roof, Dish Cooking Studio is a distinctly different neighbourhood culinary destination.</p>
            </div>
            <div class="loc item">
                <h4 class="sm--m footer--heading">Find Us In Real Life!</h4>
                <h5 class="hide-text screen-reader-text" itemprop="name">Dish Cooking Studio</h5>
                <div class="footer--location">

                    <div itemtype="http://schema.org/PostalAddress" itemscope="" itemprop="address">
                        <p itemprop="streetAddress">587 College Street</p>
                        <p><span itemprop="addressLocality">Toronto</span>, <span itemprop="addressRegion">On</span> <span itemprop="postalCode">M6G 1B2</span></p>
                    </div>
                    <p>Email: <span itemprop="email"><a href="mailto:info@dishcookingstudio.com" rel="email">info@dishcookingstudio.com</a></span></p>
                    <p>Phone: <a href="tel:+1-416-920-5559" rel="telephone"><span itemprop="telephone">416-920-5559</span></a></p>
                    <p class="is--hidden">Url: <span itemprop="url"><a href="https://www.dishcookingstudio.com">https://www.dishcookingstudio.com</a></span></p>

                    <p class="is--hidden" itemprop="paymentAccepted">cash, check, credit card, debit</p>
                    <span class="is--hidden" itemprop="priceRange">$$</span>
                    <div class="is--hidden" itemtype="http://schema.org/GeoCoordinates" itemscope="" itemprop="geo">
                        <meta itemprop="latitude" content="43.655346"><meta itemprop="longitude" content="-79.413246">
                    </div>

                </div>
            </div>
            <div class="hour item">
            <h4 class="sizes-SM footer--heading">Store Hours</h4>
                <ul class="no-bullet hours--list">
                    <li itemprop="openingHours" content="Mo-Fri 11:00-18:00">Mon-Fri: 11-6</li>
                    <li itemprop="openingHours" content="Sa 11:00-16:00">Sat: 11-4</li>
                    <li itemprop="openingHours" content="Su 12:00-16:00">Sun: 12-4</li>
                </ul>
            </div>
            <div class="nav1" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <h4 class="xsm--m footer--heading">Browse <span class="hide-text screen-reader-text">sections</span></h4>
                <ul class="no-bullet">
                    <li><a href="/class-calendar/">Class Calendar</a></li>
                    <li><a href="/class-formats/">Class Formats</a></li>
                    <li><a href="/chefs/">Dish Chefs</a></li>
                    <li><a href="/private-cooking-experiences/">Corporate Events</a></li>
                    <li><a href="/shop/gift-cards/">Gift Cards</a></li>
                    <li aria-hidden="true">&mdash;</li>
                    <li><a href="/about-dish/">About Dish</a></li>
                    <li><a href="/recipe-archive/">Recipes</a></li>
                    <li><a href="/about-dish/frequently-asked-questions/">FAQ's</a></li>
                    <li><a href="/private-events/dish-studio-rentals/">Studio Rental</a></li>
                </ul>
            </div>
            <div class="nav2" itemscope itemtype="http://www.schema.org/SiteNavigationElement">
                <h4 class="xsm--m footer--heading">Shop <span class="hide-text screen-reader-text">At Dish</span></h4>
                <ul class="no-bullet">
                    <li><a href="/shop/">Shop</a></li>
                    <li><a href="/shop/prepared-meals/">Prepared Meals</a></li>
                    <li><a href="/shop/pantry-essentials/">Pantry Essentials</a></li>
                    <li><a href="/shop/kitchen-tools/">Kitchen Tools</a></li>
                    <li><a href="/shop/home-delivery/">Home Delivery</a></li>
                    <li aria-hidden="true">&mdash;</li>
                    <li><a href="/about-dish/cancellation-policy">Cancellation Policy</a></li>
                    <li><a href="/about-dish/privacy-policy/">Privacy Policy</a></li>
                    <li><a href="/contact-us/">Contact Us</a></li>
                </ul>
            </div>
        </section>
        <p class="source-org copyright">&copy; <?php echo date('Y'); ?> Dish Cooking Studio.</p>
    </footer>
</div>

<span id="exit-off-canvas" class="exit-offcanvas"></span>

<?php do_action( 'dish_after_footer' ); ?>

<?php wp_footer(); ?>

<?php if( in_array( $_SERVER['REMOTE_ADDR'], array( '127.0.0.1', '::1' ) ) ) { ?>
<link rel="stylesheet" href="/assets/dev/css/debug.css" media="all">
<div id="devMenu">    
    <h6>Window Width: <span id="width"></span> px</h6>
    <div id="debug-features"> for debug output of features </div>
</div> 
<script src="/assets/dev/js/working.js"></script>
<script>
    function widthSetter() { document.getElementById("width").innerHTML = window.innerWidth; }
    widthSetter();
    window.addEventListener("resize", widthSetter);
</script>
<?php } ?>
</body>
</html>
