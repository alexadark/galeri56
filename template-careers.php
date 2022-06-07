<?php
/*
Template Name: Careers
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
        <div class="row contact-box">
            <div class="small-20 medium-10 columns">
                <?php

                $job_opening_sets = get_field('job_opening_sets');

                $terms = get_terms( array(
                    'taxonomy' => 'career_category',
                    'hide_empty' => TRUE,
                ) );

                foreach($terms as $term):

              $args = array(
                'post_type'      => 'career',
                'post_status'    => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC'
              );
              $tax_query = array();
            $tax_query[] =  array(
              'taxonomy' => 'career_category',
              'field' => 'term_id',
              'terms' => $term->term_id
            );
            $args['tax_query'] = $tax_query;
            $careers = get_posts($args);
                ?>


                <div class="address set" style="margin-bottom: 20px;">
                    <small><?php print $term->name;?></small>
                    <div class="items" style="margin-top: 5px;">
                        <?php foreach($careers as $career):?>
                        <div class="row row-item">
                            <div class="small-15 medium-15 columns">
                                <p><a href="<?php print get_permalink($career->ID);?>"><?php print $career->post_title;?></a></p>
                            </div>
                            <div class="small-10 medium-5 columns">
                            </div>
                        </div>
                        <?php endforeach;?>
                    </div>
                </div>
                <?php endforeach;?>
            </div>

        </div>

        <div class="row">
            <div class="small-20 columns">
                <img src="<?php the_field('shelton_mindel_office'); ?>" alt="Photo">
                <br><br>
            </div>
        </div>
    </div>
    
<?php get_footer(); ?>
