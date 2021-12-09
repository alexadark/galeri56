<?php
/*
Template Name: Books
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
            <div class="small-20 small-medium-13 medium-13 columns">
                <ul class="books-list">
                    <?php
                        $args = array(
                            'post_type' => 'books',
                            'posts_per_page' => -1,
                            'meta_key' => 'year',
                            'orderby' => 'meta_value_num',
                            'order' => 'DESC'
                        );

                        $the_query = new WP_Query( $args );
                    ?>

                    <?php if ( $the_query->have_posts() ) : ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <li>
                                <div class="row">
                                    <div class="hide-for-small small-3 medium-3 large-2 columns">
                                       <div class="year"><?php the_field('year'); ?>&nbsp;</div> 
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
                                    
                                    <div class="small-13 medium-11 large-13 columns">
                                        <div class="hide-for-medium-up desc-year"><?php the_field('year'); ?></div>
                                        
                                        <div class="name">
                                            <?php if( get_field('url') ): ?>
                                            <a target="_blank" href="<?php the_field('url'); ?>">
                                                <?php the_field('title'); ?>
                                                <?php if( get_field('author') ): ?>
                                                    <small>by <?php the_field('author'); ?></small>
                                                <?php endif; ?>
                                            </a>
                                            <?php else: ?>
                                                <?php the_field('title'); ?>
                                                <?php if( get_field('author') ): ?>
                                                    <small>by <?php the_field('author'); ?></small>
                                                <?php endif; ?>
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

            <div class="small-20 small-medium-6 medium-6 columns">
                <div class="book-cover">
                    <a target="_blank" href="<?php the_field('purchase_link'); ?>">
                        <img src="<?php the_field('book_cover'); ?>" alt="Shelton, Mindel &amp; Associates, Architecture and Design">
                    </a>

                    <div>
                        <a target="_blank" href="<?php the_field('purchase_link'); ?>" class="buy-button">Purchase</a>
                    </div>

                    <br><br>
                </div>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>