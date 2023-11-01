
<h4 class="sidebar-title">Related Products</h4>
<p><small>Cross sell products per class</small></p>
<?php
$related_products = get_field('related_products');
//$product = wc_get_product( $related_products );
if( $related_products ): ?>
    <ul class="sidebar-list">
    <?php foreach( $related_products as $related_product ): 
        $permalink = get_permalink( $related_product->ID );
        $title = get_the_title( $related_product->ID );
        //$price = get_price( $related_product->ID );
        $custom_field = get_field( 'field_name', $related_product->ID );
        ?>
        <li class="sidebar-media">
            <img class="sidebar-media--img" src="<?php echo get_the_post_thumbnail_url( $related_product->ID ); ?>" alt="">
            <h5 class="sidebar-media--subtitle"><a class="sidebar-media--content" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a></h5>
            <?php // echo $related_product->get_price( $related_product->ID ); ?>
            <!-- <span>A custom field from this post: <?php echo esc_html( $custom_field ); ?></span> -->
        </li>
    <?php endforeach; ?>
    </ul>
<?php endif; ?>