<?php
/*
Template Name: Projects
*/
?>

<?php get_header(); ?>

<div id="page-header">
    <div class="row">
        <!-- <div class="small-20 large-10 columns">
            <h1><?php the_title(); ?></h1>
        </div> -->

        <div class="small-20 large-10 columns">
            <ul class="filter-grid small-block-grid-1 large-block-grid-2">
                <li>
                    <div class="heading">
                        <a id="category-selector" href="#">
                            Category
                        </a>
                    </div>

                    <?php
                            $types = get_terms('project-type', array(
                                'orderby' => 'name',
                                'hide_empty' => true,
                            ));
                        ?>

                    <ul class="cats">
                        <li><a data-type="*" href="#">View All</a></li>

                        <?php foreach ($types as $type): ?>
                        <li><a data-type="<?php echo $type->slug; ?>" href="#"><?php echo $type->name; ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <li>
                    <div class="view-switcher">
                        <div class="wrap">
                            <a href="#" id="grid-view" class="current">Grid</a>/<a href="#" id="list-view">List</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="main">
    <div class="row">
        <div class="small-20 columns">
            <ul class="project-grid grid-view small-block-grid-2 medium-block-grid-3 large-block-grid-4">
                <?php
                        $args = array(
                            'post_type' => 'exhibition',
                            'post_status' => 'publish',
                            'posts_per_page' => -1,
                        );

                        $the_query = new WP_Query( $args );
                    ?>

                <?php if ( $the_query->have_posts() ) : ?>
                <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                <?php
                                $c = wp_get_post_terms($post->ID, 'project-type', array("fields" => "all"));
                                $project_slug = $c[0]->slug;
                                $project_cat = $c[0]->name
                            ?>

                <li class="proj <?php echo $project_slug; ?>">
                    <a href="<?php echo get_permalink(); ?>">
                        <span class="grid-content">
                            <div class="thumbnail">
                                <?php if( get_field('thumbnail') ): ?>
                                <?php $img = wp_get_attachment_image_src( get_field('thumbnail'), 'grid-356x503' ); ?>
                                <img src="<?php echo $img[0]; ?>" width="356" height="503" alt="Thumbnail">
                                <?php endif; ?>
                            </div>

                            <div class="title">
                                <div class="heading"><?php the_title(); ?></div>
                                <div class="project-category">
                                    <?php echo $project_cat; ?>
                                </div>
                                <div class="project-code"><?php the_field('project_code'); ?></div>
                            </div>
                        </span>

                        <span class="list-content">
                            <div class="row">
                                <div class="small-4 medium-3 columns">
                                    <?php if( get_field('list_view_thumbnail') ): ?>
                                    <?php $img = wp_get_attachment_image_src( get_field('list_view_thumbnail'), 'list-166x110' ); ?>
                                    <div class="thumbnail" style="background-image: url(<?php echo $img[0]; ?>);"></div>
                                    <?php endif; ?>
                                </div>

                                <div class="small-16 medium-16 columns">
                                    <div class="row">
                                        <div class="small-20 medium-8 columns adjust-width">
                                            <div class="title"><?php the_title(); ?></div>
                                        </div>

                                        <div class="small-20 medium-7 columns">
                                            <div class="cat">
                                                <?php echo $project_cat; ?>
                                            </div>
                                        </div>

                                        <div class="small-20 medium-5 columns">
                                            <div class="code">
                                                <?php the_field('project_code'); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </span>
                    </a>
                </li>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
                <?php else : endif; ?>
            </ul>
        </div>
    </div>
</div>

<?php get_footer(); ?>