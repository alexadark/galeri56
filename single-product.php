<?php get_header(); ?>

    <div id="page-header">
        <div class="row">
            <div class="small-20 columns">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="main">
        <div class="row">
            <div class="small-20 medium-10 columns">
                <div class="brief">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="small-20 medium-9 columns special-left-50 hide-for-small">
                <div class="project-info row">
                    <div class="small-20 medium-16 large-12 columns">

                        <?php if( get_previous_post_link() ):  ?>
                            <div class="project-prev">
                                <small>Next</small>
                                <p><?php previous_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>


                        <?php if( get_next_post_link() ):  ?>
                            <div class="project-next">
                                <small>Previous</small>
                                <p><?php next_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="project-all">
                            <small>View All</small>
                            <p><a href="<?php echo get_permalink(10); ?>">Products</a></p>
                        </div>

                        <?php if( have_rows('brochures') ): ?>
                            <div class="project-all">
                                <small>Product Catalog</small>

                                <ul class="brochures small-block-grid-2">
                                    <?php while ( have_rows('brochures') ) : the_row(); ?>
                                        <li>
                                            <a target="_blank" href="<?php the_sub_field('url'); ?>">
                                                <img src="<?php the_sub_field('thumbnail'); ?>" alt="thumbnail">
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php else : endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php if( have_rows('product_series') ): ?>
        <?php while ( have_rows('product_series') ) : the_row(); ?>
            <div class="main">
                <div class="row">
                    <div class="small-20 medium-10 columns">
                        <div class="series-title"><?php the_sub_field('series_title'); ?></div>
                        <div class="series-content"><?php the_sub_field('series_content'); ?></div>

                        <?php
                            $text = get_sub_field('series_title');
                            $galleryId = sanitize_title_with_dashes( $text );
                        ?>
                    </div>
                </div>

                <div class="row gallery-grid">
                    <div class="small-20 columns">
                        <?php if( have_rows('series_images') ): ?>
                            <ul class="thumbnails-grid small-block-grid-4 medium-block-grid-4 large-block-grid-6" id="series-<?php echo $galleryId; ?>">
                                <?php while ( have_rows('series_images') ) : the_row(); ?>
                                    <?php
                                        $img_big = wp_get_attachment_image_src( get_sub_field('image'), 'original' );
                                        $img_thumb = wp_get_attachment_image_src( get_sub_field('image'), 'medium' );
                                        
                                        $img_caption = '<strong>' . get_sub_field('name') . '</strong>';

                                        if( get_sub_field('date') ) {
                                            $img_caption .= ', ' . get_sub_field('date');
                                        }

                                        if( get_sub_field('link') ) {
                                            $img_caption .= '<a target="_blank" style="display: block; margin: 5px 0; color: #666; text-transform: uppercase; font-size: 12px;" href="' . get_sub_field('link') . '">Product Link &rarr;</a>';
                                        }
                                    ?>

                                    <li>
                                        <div class="gallery-item">
                                            <a data-caption='<?php echo $img_caption; ?>' data-source="<?php echo $img_big[0]; ?>" href="<?php echo $img_big[0]; ?>">
                                                <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img_thumb[0]; ?>" width="<?php echo $img_thumb[1]; ?>" height="<?php echo $img_thumb[2]; ?>" alt="thumbnail">
                                            </a>
                                        </div>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php else : endif; ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else : endif; ?>

    <div class="main hide-for-medium-up">
        <div class="row">
            <div class="small-20 columns">
                <div class="project-info row">
                    <div class="small-20 small-medium-10 columns">
                        <?php if( get_previous_post_link() ):  ?>
                            <div class="project-prev">
                                <small>Next</small>
                                <p><?php previous_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>
                        
                        <?php if( get_next_post_link() ):  ?>
                            <div class="project-next">
                                <small>Previous</small>
                                <p><?php next_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>

                        <div class="project-all">
                            <small>View All</small>
                            <p><a href="<?php echo get_permalink(10); ?>">Products</a></p>
                        </div>

                        <?php if( have_rows('brochures') ): ?>
                            <div class="project-all">
                                <small>Product Catalog</small>

                                <ul class="brochures small-block-grid-2">
                                    <?php while ( have_rows('brochures') ) : the_row(); ?>
                                        <li>
                                            <a target="_blank" href="<?php the_sub_field('url'); ?>">
                                                <img src="<?php the_sub_field('thumbnail'); ?>" alt="thumbnail">
                                            </a>
                                        </li>
                                    <?php endwhile; ?>
                                </ul>
                            </div>
                        <?php else : endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>