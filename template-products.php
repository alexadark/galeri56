<?php
/*
Template Name: Products
*/
?>

<?php get_header(); ?>

    <div id="page-header">
        <div class="row">
            <div class="small-20 small-medium-10 columns">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div id="main">
        <div class="row">
            <div class="small-20 columns">
                <?php
                    $args = array(
                        'post_type' => 'product',
                        'posts_per_page' => -1,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    );

                    $the_query = new WP_Query( $args );
                ?>

                <?php if ( $the_query->have_posts() ) : ?>
                    <ul class="product-grid small-block-grid-1 medium-block-grid-2">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="thumbnail">
                                        <img src="<?php the_field('product_thumbnail'); ?>" alt="Thumbnail">
                                    </div>

                                    <div class="title">
                                        <div class="heading"><?php the_title(); ?></div>
                                        <div class="subheading"><?php the_field('subtitle'); ?></div>
                                    </div>
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </ul>
                <?php else : endif; ?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>