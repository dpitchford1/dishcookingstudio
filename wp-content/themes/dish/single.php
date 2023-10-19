<?php
/**
 * The template for displaying all single posts.
 *
 * @package dish
 */

get_header(); ?>
<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php
    while ( have_posts() ) :
        the_post();

        do_action( 'dish_single_post_before' );

        get_template_part( 'content', 'single' );

        do_action( 'dish_single_post_after' );

    endwhile; // End of the loop.
    ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
    //if single recipe post get recipe sidebar
    if (is_singular('wprm_recipe')) {
    ?>
    <?php get_sidebar( 'recipes' ); ?>

    <?php
    // if general post get general sidebar
    } else {
    ?>
    <?php get_sidebar( 'dish_sidebar' ); ?>
<?php } ?>
<?php
// do_action( 'dish_sidebar' );
get_footer();
