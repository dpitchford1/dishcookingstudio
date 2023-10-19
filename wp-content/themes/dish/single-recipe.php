<?php
/**
 * The template for displaying all single posts.
 *
 * @package dish
 */

get_header(); ?>

<!-- Get Recipe Data Blocks -->
<?php 
global $wp_scripts;
echo '<pre>';
var_dump($wp_scripts);
echo '</pre>';
// $overview = get_field('overview');
// $ingredients = get_field('ingredients');
// $instructions = get_field('instructions');

// echo '<pre>';
//     var_dump( $overview );
// echo '</pre>';

// echo '<pre>';
//     var_dump( $ingredients );
// echo '</pre>';

// echo '<pre>';
//     var_dump( $instructions );
// echo '</pre>';

?>

<?php // used in the loop
    $meta = get_field('overview'); // 'our_services' is your parent group
    $cook = $meta['cook_time']; // 'service_one' is your child group
 ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            <!-- <p>single-recipe.php</p> -->

            <?php while ( have_posts() ) : the_post();?>
                <?php do_action( 'dish_single_post_before' ); ?>    
                <?php get_template_part( 'content', 'recipe' ); ?>

                <h4>Recipe Details</h4>
                <?php if( have_rows('overview') ): ?>
                <?php while( have_rows('overview') ): the_row();?>
                <ul>
                    <li><em>output from from loop</em></li>
                    <li><strong>Cook Time:</strong> <?php the_sub_field('cook_time'); ?> - comma?</li>
                    <li><strong>Cook Time:</strong> <?php echo $cook['time']; ?> - <?php echo $cook['length']; ?> - or dash?</li>
                    <li><strong>Prep Time:</strong> <?php the_sub_field('prep_time'); ?></li>
                    <li><strong>Total Time:</strong> <?php the_sub_field('total_time'); ?></li>
                    <li><strong>Serves:</strong> <?php the_sub_field('yield'); ?></li>
                    <li><strong>Difficulty:</strong> <?php the_sub_field('difficulty'); ?></li>
                </ul>
                <?php endwhile; ?>
                <?php endif; ?>
                
                <h4>Ingredient List for <?php the_title(); ?></h4>
                <?php if( have_rows('ingredients') ): ?>
                <?php while( have_rows('ingredients') ): the_row();?>
                    <h4><?php the_sub_field('ingredient_group_heading'); ?></h4>
                    <h5>Ingredient List</h5>
                    <ol>
                        
                    <?php if( have_rows('ingredient_group') ): ?>
                    <?php while( have_rows('ingredient_group') ): the_row();?>
                        
                    <li> <?php the_sub_field('quantity'); ?>
                        <?php the_sub_field('unit'); ?>
                        <?php the_sub_field('ingredient'); ?>
                        <?php the_sub_field('note'); ?></li>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                    </ol>
                <?php endwhile; ?>
                <?php endif; ?>

                <h4>Directions for <?php the_title(); ?></h4>
                <?php if( have_rows('instructions') ): ?>
                <?php while( have_rows('instructions') ): the_row();?>
                    <h4><?php the_sub_field('directions_group_heading'); ?></h4>
                    <h5>Directions List</h5>
                    <?php if( have_rows('directions') ): ?>
                    <?php while( have_rows('directions') ): the_row();?>
                        
                        <?php the_sub_field('direction_item'); ?>
                    <?php endwhile; ?>
                    <?php endif; ?>
                    
                    <p><?php //the_sub_field('ingredient_group'); ?></p>
                    <div><p>Notes: <?php the_sub_field('notes'); ?></p></div>
                <?php endwhile; ?>
                <?php endif; ?>

                <?php do_action( 'dish_single_post_after' ); ?>
            <?php endwhile; ?>
		
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
    //if single recipe post get recipe sidebar
    if (is_singular('recipe')) {
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
