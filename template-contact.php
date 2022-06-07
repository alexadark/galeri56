<?php
/*
Template Name: Contact
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
            <div class="small-20 medium-5 columns">
                <div class="address">
                    <small>Address</small>
                    <p>
                        <?php the_field('address', 27); ?><br>
                        <a target="_blank" href="https://goo.gl/maps/pn4Tov3bxBK2">View Map</a>
                    </p>
                </div>

                <div class="tel">
                    <small>Telephone</small>
                    <p>
                        <?php the_field('phone', 27); ?>
                    </p>
                </div>
            </div>

            <div class="small-20 medium-5 columns end">
                <div class="email">
                    <small>Contact</small>
                    <p>
                        <a href="mailto:<?php the_field('general_email', 27); ?>">
                            <?php the_field('general_email', 27); ?>
                        </a>
                    </p>
                </div>

                <!-- <div class="careers">
                    <small>Careers</small>
                    <p>
                        <a href="mailto:<?php the_field('careers_email', 27); ?>">
                            <?php the_field('careers_email', 27); ?>
                        </a>
                    </p>
                </div> -->

                <div class="social-media">
                    <small>Social Media</small>

                    <ul>
                        <li>
                            <a target="_blank" href="<?php the_field('facebook', 'options'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a target="_blank" href="<?php the_field('twitter', 'options'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a target="_blank" href="<?php the_field('instagram', 'options'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-instagram fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a target="_blank" href="<?php the_field('pinterest', 'options'); ?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-pinterest fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
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
