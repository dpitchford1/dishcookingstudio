<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package dish
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
    <?php if ( have_posts() ) : ?>
        <header class="page-header">
            <?php
                the_archive_title( '<h1 class="page-title">', '</h1>' );
                the_archive_description( '<div class="taxonomy-description">', '</div>' );
            ?>
        </header><!-- .page-header -->
        <?php
        get_template_part( 'loop' );
    else :
        get_template_part( 'content', 'none' );
    endif;
    ?>
    </main><!-- #main -->
</div><!-- #primary -->

<?php
    //if single post then add excerpt as meta description
    if (in_category('recipes')) {
    ?>
    <p>Is Single - in recipes</p>

    <?php
    // if archive page for recipes get recipes sidebar
    } else if(is_archive('recipes')) {
    ?>
    <?php get_sidebar( 'recipes' ); ?>

    <?php
    // if category recipes get recipes sidebar
    } else if(is_category('recipes')) {
    ?>
    <p>recipes category - specific recipe</p>
    
    <?php
    // else get default sidebar
    } else{
    ?>
    <?php get_sidebar( 'dish_sidebar' ); ?>
<?php } ?>
<?php
get_footer();
