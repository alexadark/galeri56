<?php get_header(); ?>

    <div id="page-header">
        <div class="row">
            <div class="small-20 columns">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>

    <div class="main gallery-grid hide-for-medium-up">
        <div class="row">
            <div class="landscape-photo small-20 columns">
                <?php if( get_field('featured_landscape_image') ): ?>
                    <?php
                        $img_data = get_field('featured_landscape_image');
                        $url = $img_data['sizes']['big-1440'];
                        $width = $img_data['sizes']['big-1440-width'];
                        $height = $img_data['sizes']['big-1440-height'];
                        $perc = floor( ($height/$width) * 100 );
                    ?>
                    
                    <div class="gallery-item">
                        <a data-source="<?php echo $url; ?>" href="<?php echo $url; ?>" style="padding-bottom: <?php echo $perc . '%'; ?>">
                            <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $url; ?>">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div style="visibility: hidden; width: 0; height: 0;">
            <?php if( have_rows('space_images') ): ?>
                <ul>
                    <?php while ( have_rows('space_images') ) : the_row(); ?>
                        <?php
                            $img_big = wp_get_attachment_image_src( get_sub_field('image'), 'big-1440' );
                            $img_thumb = wp_get_attachment_image_src( get_sub_field('image'), 'square-166x166' );
                        ?>

                        <li>
                            <div class="gallery-item">
                                <a data-source="<?php echo $img_big[0]; ?>" href="<?php echo $img_big[0]; ?>"></a>
                            </div>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : endif; ?>
        </div>
    </div>

    <div class="main">
        <div class="row">
            <div class="small-20 columns hide-for-small">
                <div class="project-info row">
                    <div class="small-20 medium-5 columns">
                        <?php if( get_previous_post_link() ):  ?>
                            <div class="project-prev">
                                <small>Next</small>
                                <p><?php previous_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="small-20 medium-5 columns">
                        <?php if( get_next_post_link() ):  ?>
                            <div class="project-next">
                                <small>Previous</small>
                                <p><?php next_post_link('%link'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="small-20 medium-6 medium-offset-4 columns">
                        <div class="project-all">
                            <small>View All</small>
                            <p><a href="<?php echo get_permalink(4552); ?>">Spaces</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main gallery-grid">
        <div class="row hide-for-small">
            <div class="landscape-photo small-20 columns">
                <?php if( get_field('featured_landscape_image') ): ?>
                    <?php
                        $img_data = get_field('featured_landscape_image');
                        $url = $img_data['sizes']['big-1440'];
                        $width = $img_data['sizes']['big-1440-width'];
                        $height = $img_data['sizes']['big-1440-height'];
                        $perc = floor( ($height/$width) * 100 );
                    ?>
                    
                    <div class="gallery-item">
                        <a data-source="<?php echo $url; ?>" href="<?php echo $url; ?>" style="padding-bottom: <?php echo $perc . '%'; ?>">
                            <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $url; ?>">
                        </a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="row" id="project-thumbnails">
            <div class="small-20 columns">
                <?php if( have_rows('space_images') ): ?>
                    <ul class="thumbnails-grid small-block-grid-4 medium-block-grid-6 large-block-grid-8">
                        <?php while ( have_rows('space_images') ) : the_row(); ?>
                            <?php
                                $img_big = wp_get_attachment_image_src( get_sub_field('image'), 'big-1440' );
                                $img_thumb = wp_get_attachment_image_src( get_sub_field('image'), 'square-166x166' );
                            ?>

                            <li>
                                <div class="gallery-item">
                                    <a data-caption="<?php the_sub_field('link'); ?>" data-source="<?php echo $img_big[0]; ?>" href="<?php echo $img_big[0]; ?>">
                                        <img class="lazy" src="<?php echo IMAGES; ?>blank.gif" data-original="<?php echo $img_thumb[0]; ?>" width="<?php echo $img_thumb[1]; ?>" height="<?php echo $img_thumb[2]; ?>">
                                    </a>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : endif; ?>
            </div>
        </div>
    </div>

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
                            <p><a href="<?php echo get_permalink(4552); ?>">Spaces</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>