<?php
/*
Template Name: News
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
                <ul class="news-list">
                    <?php
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'orderby' => 'date',
                            'order' => 'DESC',
                            'cat' => 12
                        );

                        $the_query = new WP_Query( $args );
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <div class="row">
                                    <div class="hide-for-small small-4 medium-3 large-3 columns">
                                        <div class="date">
                                            <?php the_time('M j, Y'); ?>
                                        </div> 
                                    </div>

                                    <div class="small-7 medium-4 large-3 columns">
                                        <?php if( get_field('news_image') ): ?>
                                            <?php
                                                $img = wp_get_attachment_image_src( get_field('news_image'), 'table-228' );
                                                $perc = floor( ($img[2]/$img[1]) * 100 );
                                            ?>

                                            <?php if( get_field('news_link') ): ?>
                                                <a class="photo-thumb" target="_blank" href="<?php the_field('news_link'); ?>" style="padding-bottom: <?php echo $perc . '%'; ?>">
                                                    <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img[0]; ?>">
                                                </a>
                                            <?php else: ?>
                                                <div class="photo-thumb" style="padding-bottom: <?php echo $perc . '%'; ?>">
                                                    <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img[0]; ?>">
                                                </div>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                    
                                    <div class="small-13 medium-12 large-13 columns">
                                        <div class="architects-eye-title">
                                            <div class="hide-for-medium-up desc-year">
                                                <?php the_time('M j, Y'); ?>
                                            </div>
                                            
                                            <div class="news-title">
                                                <?php if( get_field('news_link') ): ?>
                                                    <a target="_blank" href="<?php the_field('news_link'); ?>">
                                                        <?php the_field('news_title'); ?>
                                                    </a>
                                                <?php else: ?>
                                                    <?php the_field('news_title'); ?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                        
                                        <div class="desc">
                                            <?php if( get_field('news_description') ): ?>
                                                <?php the_field('news_description'); ?>
                                            <?php endif; ?>
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