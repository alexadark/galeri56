<?php
/*
Template Name: Home
*/
?>

<?php get_header(); ?>

    <div id="page-header">
        <div class="row">
            <div class="small-20 columns">
                <?php if( have_rows('homepage_slideshow') ): ?>
                    <a href="<?php echo get_permalink(7); ?>">
                        <div id="homepage-slideshow" class="royalSlider rsDefault">
                            <?php while ( have_rows('homepage_slideshow') ) : the_row(); ?>
                                <div class="slide">
                                    <img class="rsImg" src="<?php the_sub_field('photo'); ?>">
                                </div>
                            <?php endwhile; ?>
                        </div>
                    </a>
                <?php else : endif; ?>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>