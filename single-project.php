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
            <?php if( have_rows('slideshow') ): ?>
                <ul>
                    <?php while ( have_rows('slideshow') ) : the_row(); ?>
                        <?php
                            $img_big = wp_get_attachment_image_src( get_sub_field('photo'), 'big-1440' );
                            $img_thumb = wp_get_attachment_image_src( get_sub_field('photo'), 'square-166x166' );
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
            <div class="small-20 medium-10 columns">
                <div class="brief">
                    <?php the_field('brief'); ?>
                </div>

                <div class="solution">
                    <div class="sol-content">
                        <?php the_field('solution'); ?>
                    </div>
                </div>

                <?php if( have_rows('slideshow') ): ?>
                    <div class="btn-list">
                        <a class="view-slideshow" href="#">View Slideshow</a>
                        <a class="view-thumbnails" href="#project-thumbnails">Thumbnails</a>

                        <div class="social-media">
                            <ul>
                                <li>
                                    <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo get_permalink(); ?>', 'facebook-share-dialog', 'width=626,height=436'); return false;">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#" onclick="window.open('https://twitter.com/intent/tweet?text=<?php print sp_social_title( get_the_title() ); ?>&amp;via=SheltonMindel&amp;url=<?php echo wp_get_shortlink(); ?>', 'twitter-share-dialog', 'width=626,height=436'); return false;">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href="https://plus.google.com/share?url=<?php echo get_permalink(); ?>" onclick="window.open('https://plus.google.com/share?url=<?php echo get_permalink(); ?>','googleplus-share-dialog', 'height=600,width=600'); return false;">
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>

                                <li>
                                    <a href='javascript:void((function()%7Bvar%20e=document.createElement(&apos;script&apos;);e.setAttribute(&apos;type&apos;,&apos;text/javascript&apos;);e.setAttribute(&apos;charset&apos;,&apos;UTF-8&apos;);e.setAttribute(&apos;src&apos;,&apos;http://assets.pinterest.com/js/pinmarklet.js?r=&apos;+Math.random()*99999999);document.body.appendChild(e)%7D)());'>
                                        <span class="fa-stack fa-lg">
                                            <i class="fa fa-circle fa-stack-2x"></i>
                                            <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="small-20 medium-9 columns special-left-50 hide-for-small">
                <div class="project-info row">
                    <div class="small-20 small-medium-10 columns">
                        <div class="project-cat">
                            <small>Category</small>
                            <p>
                                <?php
                                    $c = wp_get_post_terms($post->ID, 'project-type', array("fields" => "names"));
                                    print_r($c[0]);
                                ?>
                            </p>
                        </div>

                        <?php if(get_field('project_code')): ?>
                            <div class="project-code">
                                <small>Project Code</small>
                                <p><?php the_field('project_code'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('photo_credits')): ?>
                            <div class="project-code">
                                <small>Photographer</small>
                                <p><?php the_field('photo_credits'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('architect')): ?>
                            <div class="project-code">
                                <small>Architect</small>
                                <p><?php the_field('architect'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('awards')): ?>
                            <div class="project-code">
                                <small>Awards</small>
                                <?php $awards = get_field('awards');?>
                                <?php foreach($awards as $award):?>
                                <p>
                                    <?php if ($award['url']):?>
                                    <a href="<?php print $award['url'];?>" style="text-decoration: none;">
                                    <?php endif;?>
                                    <?php print $award['year'];?><br>
                                    <?php print $award['description'];?>
                                    <?php if ($award['url']):?>
                                    </a>
                                    <?php endif;?>
                                </p>
                                <?php endforeach;?>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('press')): ?>
                            <div class="project-code">
                                <small>Press</small>
                                <?php $presses = get_field('press');?>
                                <?php foreach($presses as $press):?>
                                <p>
                                    <?php if ($press['url']):?>
                                    <a href="<?php print $press['url'];?>" style="text-decoration: none;" target="_blank">
                                    <?php endif;?>
                                    <?php print $press['date'];?><br>
                                    <?php print $press['description'];?>
                                    <?php if ($press['url']):?>
                                    </a>
                                    <?php endif;?>
                                </p>
                                <?php endforeach;?>
                            </div>
                        <?php endif; ?>


                    </div>

                    <div class="small-20 small-medium-10 columns">
                        <div class="project-prev">
                            <small>Next</small>
                            <p><?php previous_post_link('%link'); ?></p>
                        </div>

                        <div class="project-next">
                            <small>Previous</small>
                            <p><?php next_post_link('%link'); ?></p>
                        </div>

                        <div class="project-all">
                            <small>View All</small>
                            <p><a href="<?php echo get_permalink(7); ?>">Projects</a></p>
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
                <?php if( have_rows('slideshow') ): ?>
                    <ul class="thumbnails-grid small-block-grid-4 medium-block-grid-6 large-block-grid-8">
                        <?php while ( have_rows('slideshow') ) : the_row(); ?>
                            <?php
                                $img_big = wp_get_attachment_image_src( get_sub_field('photo'), 'big-1440' );
                                $img_thumb = wp_get_attachment_image_src( get_sub_field('photo'), 'square-166x166' );
                            ?>

                            <li>
                                <div class="gallery-item">
                                    <a data-source="<?php echo $img_big[0]; ?>" href="<?php echo $img_big[0]; ?>">
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
                        <div class="project-cat">
                            <small>Category</small>
                            <p>
                                <?php
                                    $c = wp_get_post_terms($post->ID, 'project-type', array("fields" => "names"));
                                    print_r($c[0]);
                                ?>
                            </p>
                        </div>

                        <?php if(get_field('project_code')): ?>
                            <div class="project-code">
                                <small>Project Code</small>
                                <p><?php the_field('project_code'); ?></p>
                            </div>
                        <?php endif; ?>

                        <?php if(get_field('photo_credits')): ?>
                            <div class="project-code">
                                <small>Photographer</small>
                                <p><?php the_field('photo_credits'); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="small-20 small-medium-10 columns">
                        <div class="project-prev">
                            <small>Next</small>
                            <p><?php previous_post_link('%link'); ?></p>
                        </div>

                        <div class="project-next">
                            <small>Previous</small>
                            <p><?php next_post_link('%link'); ?></p>
                        </div>

                        <div class="project-all">
                            <small>View All</small>
                            <p><a href="<?php echo get_permalink(7); ?>">Projects</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
