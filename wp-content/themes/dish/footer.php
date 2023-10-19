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
</div><!-- #content -->

<?php do_action( 'dish_before_footer' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">

        <?php
        /**
         * Functions hooked in to dish_footer action
         *
         * @hooked dish_footer_widgets - 10
         * @hooked dish_credit         - 20
         */
        do_action( 'dish_footer' );
        ?>

    </div><!-- .col-full -->
</footer><!-- #colophon -->

<?php do_action( 'dish_after_footer' ); ?>

<?php wp_footer(); ?>
</body>
</html>
