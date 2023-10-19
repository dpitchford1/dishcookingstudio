<?php
/**
 * The template for displaying recipe pages.
 *
 * Template Name: Recipe
 * Template Post Type: post, page, recipe
 *
 * @package dish
 */

get_header(); ?>
<?php 
    // display the content
    $the_content = apply_filters('the_content', get_the_content());

    $recipe = get_field('recipe_data'); // 'recipe_data' is your parent group

?>
<?php

?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section>
            <article>
                <!-- <h4>Recipe Title: <?php the_title(); ?></h4>
                <p>Date published: <?php echo get_the_date( 'Y-m-d' ); ?></p> -->

            <!-- IMG -->
            <!-- <?php if ( has_post_thumbnail() ) : ?>
                <h4 style="float:left">Recipe IMG:</h4>
			    <a href="<?php the_permalink(); ?>" class="img--is-listing">
			    <?php the_post_thumbnail( 'large' ); ?>
			    </a>
			<?php endif; ?> -->
                <!-- <h4>Recipe IMG: <?php the_post_thumbnail(' small ', array('class' => 'img--primary-featured')); ?></h4> -->

                <!-- Desc -->
                <!-- <h4>Recipe Description: <?php
                if ( !empty($the_content) ) {
                    echo $the_content;
                  }
                ?>
            </h4> -->

            <!-- <h4>Recipe Excerpt: <?php the_excerpt(); ?></h4> -->


            <!-- <h4>Recipe Deets</h4> -->

            <?php if( have_rows('recipe_data') ): ?>
                <?php while( have_rows('recipe_data') ): the_row();

                    

                ?>
            <!-- <ul>
                <li><strong>Cook Time:</strong> <?php the_sub_field('cook_time'); ?> </li>
                <li><strong>Prep Time:</strong> </li>
                <li><strong>Total Time:</strong> </li>
                <li><strong>Serves:</strong> </li>
                <li><strong>Difficulty:</strong> </li>
            </ul> -->

            <?php endwhile; ?>
            <?php endif; ?>


            <?php if( have_rows('overview') ): ?>
                <?php while( have_rows('overview') ): the_row(); 

                    ?>
                    <ul>
                        <li><em>output from from loop</em></li>
                        <li><strong>Cook Time:</strong> </li>
                        <li><strong>Cook Time:</strong> </li>
                        <li><strong>Prep Time:</strong> </li>
                        <li><strong>Total Time:</strong> </li>
                        <li><strong>Serves:</strong> </li>
                        <li><strong>Difficulty:</strong> </li>
                    </ul>
                    
                <?php endwhile; ?>
            <?php endif; ?>
            </article>

            </section>

            <?php // if( is_active_sidebar( 'sidebar-2' ) ) : ?>
				<aside class="widgetized-page-before-content-widget-area">
					<?php // dynamic_sidebar( 'sidebar-2' ); ?>
				</aside>
			<?php // endif; ?>
			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'dish_page_before' );

				get_template_part( 'content', 'page' );

				/**
				 * Functions hooked in to dish_page_after action
				 *
				 * @hooked dish_display_comments - 10
				 */
				do_action( 'dish_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
    <?php get_sidebar( 'recipes' ); ?>
<?php
get_footer();
