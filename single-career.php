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
                <style>
                    .about-content a {
                        color: #666;
                    }
                    .about-content a:hover {
                        color: #333;
                    }
                </style>
                <div class="about-content">
                    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
                        <?php the_content(); ?>
                    <?php endwhile; else : ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    </div>

<?php get_footer(); ?>
