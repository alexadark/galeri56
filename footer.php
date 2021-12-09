        </div><!--end of stage-->

        <footer class="site-footer">
            <div class="row quote-container">
                <div class="small-20 columns">
                    <?php if( is_404() ){ ?>
                        <p class="quote">We apologize but the page you're looking for does not exist.</p>
                    <?php } else { ?>
                        <?php
                            $quotes = get_field('quotes', 'options');
                            $rand_quote = $quotes[ array_rand($quotes) ];
                        ?>
                        <p class="quote"><?php echo $rand_quote['quote_text']; ?></p>
                        
                        <?php if( $rand_quote['credit'] ){ ?>
                            <p class="credit">&mdash;<?php echo $rand_quote['credit']; ?></p>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>

            <div class="row">
                <div class="small-20 small-medium-6 medium-6 large-10 columns">
                    <div class="row">
                        <div class="small-20 large-10 columns">
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

                        <div class="small-20 large-10 columns">
                            <div class="email">
                                <small>Contact</small>
                                <p>
                                    <a href="mailto:<?php the_field('general_email', 27); ?>">
                                        <?php the_field('general_email', 27); ?>
                                    </a>
                                </p>
                            </div>

                            <div class="careers">
                                <small>Careers</small>
                                <p>
                                    <a href="mailto:<?php the_field('careers_email', 27); ?>">
                                        <?php the_field('careers_email', 27); ?>
                                    </a>
                                </p>
                            </div>

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
                </div>
                
                <div class="small-20 small-medium-12 medium-14 large-10 columns">
                    <div class="row">
                        <div class="small-20 medium-12 large-12 columns">
                            <div class="footer-book">
                                <div class="row">
                                    <div class="small-8 columns">
                                        <a href="http://www.amazon.com/Shelton-Mindel-Associates-Architecture-Design/dp/0847838536" target="_blank">
                                            <img src="http://www.sheltonmindel.com/wp-content/uploads/2015/10/book.jpg" alt="Book Cover">
                                        </a>
                                    </div>

                                    <div class="small-12 columns">
                                        <p>
                                            SheltonMindel℠ Monograph<br>
                                            by Rizzoli New York<br>
                                        </p>

                                        <a href="http://www.rizzoliusa.com/book.php?isbn=9780847838530" class="buy-now" target="_blank">
                                            Purchase
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="small-20 medium-8 large-8 columns">
                            <div class="copyright">
                                <p>
                                    Copyright &copy; <?php echo date("Y") ?><br>
                                    Lee F. Mindel, Architect, D.P.C.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div><!--end of shifter-page-->

    <div id="back-to-top" class=""><i class="fa fa-caret-up"></i></div>

    <nav class="shifter-navigation">
        <div id="mobile-menu">
            <ul>
                <li><a class="link <?php if( is_front_page() ){ echo 'current'; } ?>" href="<?php echo home_url(); ?>">Home</a></li>
                <li><a class="link <?php if( is_page(7) ){ echo 'current'; } ?>" href="<?php echo get_permalink(7); ?>">Projects</a></li>
                <li><a class="link <?php if( is_page(10) ){ echo 'current'; } ?>" href="<?php echo get_permalink(10); ?>">Products</a></li>
                <li><a class="link <?php if( is_page(4552) ){ echo 'current'; } ?>" href="<?php echo get_permalink(4552); ?>">Spaces</a></li>
                

                <li id="sma-mobile-dropdown" class="dropdown">
                    <a class="link <?php if( is_page( array(12,14,16,18) ) ){ echo 'current'; } ?>" href="<?php echo get_permalink(12); ?>"><span>About</span></a>

                    <ul>
                        <li><a class="link sublink <?php if( is_page(12) ){ echo 'current'; } ?>" href="<?php echo get_permalink(12); ?>">Profile</a></li>
                        <li><a class="link sublink <?php if( is_page(14) ){ echo 'current'; } ?>" href="<?php echo get_permalink(14); ?>">Awards</a></li>
                        <li><a class="link sublink <?php if( is_page(18) ){ echo 'current'; } ?>" href="<?php echo get_permalink(18); ?>">Publications</a></li>
                    </ul>
                </li>
                
                <li><a class="link <?php if( is_page(16) ){ echo 'current'; } ?>" href="<?php echo get_permalink(16); ?>">Periodicals</a></li>
                <li><a class="link <?php if( is_page(25) ){ echo 'current'; } ?>" href="<?php echo get_permalink(25); ?>">Architect’s Eye</a></li>
                <li><a class="link <?php if( is_page(27) ){ echo 'current'; } ?>" href="<?php echo get_permalink(27); ?>">Contact</a></li>
            </ul>
        </div>
    </nav>
    
    <?php wp_footer(); ?>
</body>
</html>