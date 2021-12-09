<?php
/*
Template Name: Periodicals
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
                <ul class="periodicals-list">
                    <?php
                        $args = array(
                            'post_type' => 'periodical',
                            'posts_per_page' => -1,
                            'meta_key' => 'year',
                            'orderby' => 'date',
                            'order' => 'DESC'
                        );

                        $the_query = new WP_Query( $args );
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <div class="row">
                                    <div class="hide-for-small small-3 medium-2 large-2 columns">
                                       <div class="year"><?php the_field('year'); ?></div> 
                                    </div>

                                    <div class="small-7 medium-5 large-4 columns">
                                        <?php if( get_field('thumbnail') ): ?>
                                            <?php $img = wp_get_attachment_image_src( get_field('thumbnail'), 'table-228' ); ?>
                                            
                                            <?php if( get_field('url') ): ?>
                                                <a target="_blank" href="<?php the_field('url'); ?>">
                                                    <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                                </a>
                                            <?php else: ?>
                                                <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img[0]; ?>" width="<?php echo $img[1]; ?>" height="<?php echo $img[2]; ?>">
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>

                                    <div class="small-13 medium-12 large-13 columns">
                                        <div class="row">
                                            <div class="small-20 medium-9 columns">
                                                <div class="hide-for-medium-up desc-year"><?php the_field('year'); ?></div>
                                                
                                                <div class="desc special">
                                                    <?php the_field('periodical_name'); ?>
                                                </div>
                                            </div>

                                            <div class="small-20 medium-10 columns">
                                                <div class="name">
                                                    <?php if( get_field('url') ): ?>
                                                        <a href="<?php the_field('url'); ?>"><?php the_field('title'); ?></a>
                                                    <?php else: ?>
                                                        <?php the_field('title'); ?>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    <?php else : endif; ?>
                </ul>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>