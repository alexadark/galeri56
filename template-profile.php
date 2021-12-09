<?php
/*
Template Name: Profile
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
            <div class="small-20 small-medium-13 medium-10 columns">
                <div class="about-content">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; else : ?>
                    <?php endif; ?>
                </div>
            </div>

            <div class="small-20 small-medium-7 medium-10 columns">
                <div class="profile-photo">
                    <img src="<?php the_field('profile_photo'); ?>" alt="Photograph">
                </div>
            </div>
        </div>

        <div class="row team">
            <div class="small-20 columns">
                <h2>Principals</h2>

                <?php if( have_rows('principals') ): ?>
                    <ul class="small-block-grid-1 medium-block-grid-2">
                        <?php while ( have_rows('principals') ) : the_row(); ?>
                            <li>
                                <div class="row">
                                    <div class="small-5 medium-7 columns">
                                        <img src="<?php the_sub_field('photo'); ?>" alt="<?php the_sub_field('title'); ?>">
                                    </div>

                                    <div class="small-15 medium-12 columns end">
                                        <p><?php the_sub_field('description'); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : endif; ?>
            </div>
        </div>

        <div class="row team">
            <div class="small-20 columns">
                <h2>Team</h2>
                
                <?php if( have_rows('associates') ): ?>
                    <ul class="small-block-grid-1 medium-block-grid-2">
                        <?php while ( have_rows('associates') ) : the_row(); ?>
                            <li>
                                <div class="row">
                                    <div class="small-5 medium-7 columns">
                                        <img src="<?php the_sub_field('photo'); ?>" alt="<?php the_sub_field('title'); ?>">
                                    </div>

                                    <div class="small-15 medium-12 columns end">
                                        <p><?php the_sub_field('description'); ?></p>
                                    </div>
                                </div>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php else : endif; ?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>