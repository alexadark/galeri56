<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php wp_title('|', true, 'right'); ?></title>

    <meta name="google-site-verification" content="c9edQxttii3okgT3pZGuJ-qAx33p-eUu_B2LQRLvSEs" />

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
    <link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
    <link rel="manifest" href="/manifest.json">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#969494">
    <meta name="theme-color" content="#ffffff">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">

    <script src="<?php bloginfo('stylesheet_directory'); ?>/js/top.min.js"></script>
    
    <?php wp_head(); ?>
</head>

<?php if( is_page(array(1264, 10, 12, 14, 16, 18, 23, 25, 27, 5378)) ): ?>
    <body <?php body_class('loading'); ?>>
<?php else: ?>
    <body <?php body_class(); ?>>
<?php endif; ?>

    <div class="shifter-page">
        <div class="stage">
            <header class="site-header">
                <div class="row">
                    <div class="small-16 medium-6 columns">
                        <div class="logo">
                            <a href="<?php echo home_url(); ?>">
                                <span class="span-one">
                                    <img src="<?php echo IMAGES; ?>shelton-mindel.svg" alt="Shelton, Mindel &amp; Associates, Inc.">
                                </span>

                                <span class="span-two">
                                    <img src="<?php echo IMAGES; ?>shelton-mindel.svg" alt="Shelton, Mindel &amp; Associates, Inc.">
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="small-4 medium-14 columns">
                        <nav>
                            <ul class="navigation">
                                <li class="desktop-link link"><a class="<?php if( is_page(7) ){ echo 'current'; } ?>" href="<?php echo get_permalink(7); ?>">Projects</a></li>
                                <li class="desktop-link link"><a class="<?php if( is_page(10) ){ echo 'current'; } ?>" href="<?php echo get_permalink(10); ?>">Products</a></li>
                                <li class="desktop-link link"><a class="<?php if( is_page(4552) ){ echo 'current'; } ?>" href="<?php echo get_permalink(4552); ?>">Spaces</a></li>

                                <li class="desktop-link link has-subnav">
                                    <a class="<?php if( is_page( array(12,14,16,18) ) ){ echo 'current'; } ?>" href="javascript:void(0)">About <i class="fa fa-caret-down"></i></a>
                                    <ul class="subnav">
                                        <li class="subnav-link"><a class="<?php if( is_page(12) ){ echo 'current'; } ?>" href="<?php echo get_permalink(12); ?>">Profile</a></li>
                                        <li class="subnav-link"><a class="<?php if( is_page(14) ){ echo 'current'; } ?>" href="<?php echo get_permalink(14); ?>">Awards</a></li>
                                        <li class="subnav-link"><a class="<?php if( is_page(18) ){ echo 'current'; } ?>" href="<?php echo get_permalink(18); ?>">Publications</a></li>
                                        <li class="subnav-link"><a class="<?php if( is_page(5378) ){ echo 'current'; } ?>" href="<?php echo get_permalink(5378); ?>">Careers</a></li>
                                    </ul>
                                </li>
                                
                                <li class="desktop-link link"><a class="<?php if( is_page(16) ){ echo 'current'; } ?>" href="<?php echo get_permalink(16); ?>">Periodicals</a></li>
                                <li class="desktop-link link"><a class="<?php if( is_page(25) ){ echo 'current'; } ?>" href="<?php echo get_permalink(25); ?>">Architect’s Eye</a></li>
                                <li class="desktop-link link"><a class="<?php if( is_page(27) ){ echo 'current'; } ?>" href="<?php echo get_permalink(27); ?>">Contact</a></li>
                                <li class="mobile-link link">
                                    <a id="open-mobile-menu" class="shifter-handle" href="#"></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </header>
    
