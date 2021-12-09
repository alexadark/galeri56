/*global enquire*/

(function($){
    //vars
    var sw = $(window).width(),
        sh = $(window).height(),
        catsOpen = false,
        $grid;

/* ====================== Lazy Load ==================================================================== */

    $("img.lazy").show().lazyload({
        threshold : 400
    });

/* ====================== Mobile Nav =================================================================== */

    if( !$('html.lt-ie9').length ) {
        $.shifter({
            maxWidth: '1024px'
        });
    }

/* ====================== Enquire ====================================================================== */

    if( !$('html.lt-ie9').length ) {
        enquire.register("screen and (min-width:1025px)", {
            match: function() {
                $.shifter("disable");
            },
            unmatch: function() {
                $.shifter("enable");
            }
        });
    }

/* ====================== Gallery ====================================================================== */

    $('.gallery-hidden').each(function(){
        $(this).magnificPopup({
            delegate: 'a',
            type: 'image',
            closeOnContentClick: false,
            closeBtnInside: false,
            mainClass: 'mfp-with-zoom mfp-img-mobile',
            image: {
                markup: '<div class="mfp-figure">'+
                    '<div class="mfp-close"></div>'+
                    '<div class="mfp-img"></div>'+
                    '<div class="mfp-bottom-bar">'+
                        '<div class="mfp-title"></div>'+
                    '</div>',
                verticalFit: true,
                titleSrc: function(item) {
                    return item.el.attr('data-caption');
                }
            },
            gallery: {
                enabled: true
            },
            zoom: {
                enabled: false
            }
        });
    });

    if( $('body.single-space').length ) {
        $('.gallery-grid').each(function(){
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    markup: '<div class="mfp-figure">'+
                        '<div class="mfp-close"></div>'+
                        '<div class="mfp-img"></div>'+
                        '<div class="mfp-bottom-bar">'+
                            '<div class="mfp-title"></div>'+
                        '</div>',
                    verticalFit: true,
                    titleSrc: function(item) {
                        if( item.el.attr('data-caption') ) {
                            return '<a target="_blank" href="' + item.el.attr('data-caption') + '">Link to project →</a>';
                        } else {
                            return false;
                        }
                    }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: false
                }
            });
        });
    } else {
        $('.gallery-grid').each(function(){
            $(this).magnificPopup({
                delegate: 'a',
                type: 'image',
                closeOnContentClick: false,
                closeBtnInside: false,
                mainClass: 'mfp-with-zoom mfp-img-mobile',
                image: {
                    markup: '<div class="mfp-figure">'+
                        '<div class="mfp-close"></div>'+
                        '<div class="mfp-img"></div>'+
                        '<div class="mfp-bottom-bar">'+
                            '<div class="mfp-title"></div>'+
                        '</div>',
                    verticalFit: true,
                    titleSrc: function(item) {
                        return item.el.attr('data-caption');
                    }
                },
                gallery: {
                    enabled: true
                },
                zoom: {
                    enabled: false
                }
            });
        });
    }    

    $('.btn-list .view-slideshow').click(function(event) {
        event.preventDefault();
        $( ".landscape-photo .gallery-item a" ).trigger( "click" );
    });

    $('.btn-list .view-thumbnails').click(function(event) {
        event.preventDefault();
        $('html, body').animate({scrollTop: $('#project-thumbnails').offset().top - 20 }, 750);
    });

    $('.btn-list .view-series-slideshow').click(function(event) {
        event.preventDefault();
        var seriesToShow = '#' + $(this).data('series') + ' .gallery-item a';
        $(seriesToShow).eq(0).trigger( "click" );
    });

/* ====================== Slideshow ==================================================================== */

    if( $('#homepage-slideshow').length ) {
        $('#homepage-slideshow').royalSlider({
            imageScaleMode: 'none',
            autoScaleSlider: true,
            autoScaleSliderWidth: 1440,
            autoScaleSliderHeight: 900,
            navigateByClick: false,
            transitionType: 'fade',
            transitionSpeed: 1000,
            sliderDrag: false,
            slidesSpacing : 0,
            controlNavigation: 'none',
            arrowsNav: false,
            loop: true,
            autoPlay: {
                enabled: true,
                pauseOnHover: false,
                stopAtAction: false,
                delay: 3000
            }
        });
    }

/* ====================== Video ======================================================================== */

    $("#main, .main").fitVids();

/* ====================== Miscellaneous ================================================================ */

    $('#category-selector').click(function(event) {
        event.preventDefault();

        if(!catsOpen) {
            $('.cats').slideDown();
            catsOpen = true;
        } else {
            $('.cats').slideUp();
            catsOpen = false;
        }
    });

    $('.cats li a').click(function(event) {
        event.preventDefault();
        var $el = $(this),
            $projectsToShow = $(this).data('type');

        if($projectsToShow === '*') {
            $grid.isotope({ filter: '*' });
        } else {
            $grid.isotope({ filter: '.' + $projectsToShow });
        }

        $('.cats').slideUp(function(){
            if( $el.text() === 'View All' ) {
                $('#category-selector').text('Category');
            } else {
               $('#category-selector').text( $el.text() );
            }
            
            catsOpen = false;
        });
    });

    $('.view-switcher a').click(function(event) {
        event.preventDefault();
        var $el = $(this);

        if( !$el.hasClass('current') ) {
            $('.view-switcher a').removeClass('current');
            $el.addClass('current');

            $('.cats').slideUp();
            catsOpen = false;

            if( $el.attr('id') === 'grid-view' ) {
                $('ul.project-grid').removeClass('list-view');
                $('ul.project-grid').addClass('grid-view small-block-grid-2 medium-block-grid-3 large-block-grid-4');
            } else if( $el.attr('id') === 'list-view' ) {
                $('ul.project-grid').removeClass('grid-view small-block-grid-2 medium-block-grid-3 large-block-grid-4');
                $('ul.project-grid').addClass('list-view');
            }

            $(window).trigger('resize');
        }
    });

    $('#sma-mobile-dropdown > a.link').click(function(event) {
        event.preventDefault();

        var $el = $('#sma-mobile-dropdown');

        if( $el.hasClass('open') ){
            $el.removeClass('open');
        } else {
            $el.addClass('open');
        }
    });

    $('.sol-content').readmore({
        collapsedHeight: 92,
        moreLink: '<a class="more-link" href="#">Read more</a>',
        lessLink: '<a class="close-link" href="#">Close</a>'
    });

/* ====================== Scroll ========================================================================= */

    $('#back-to-top').click(function() {
        $('html,body').animate( { scrollTop: 0 }, 450 );
    });

    $(window).scroll(function() {
        if( $(this).scrollTop() >= 104 ) {
            if( $('#back-to-top').hasClass('hide-btn') ) {
                $('#back-to-top').removeClass('hide-btn');
            }
        } else {
            if( !$('#back-to-top').hasClass('hide-btn') ) {
                $('#back-to-top').addClass('hide-btn');
            }
        }
    });

/* ====================== Load ========================================================================= */

    $(window).load(function() {
        $(window).resize();
        $('body').removeClass('loading');
        $(window).trigger('resize');
    });

/* ====================== Resize ======================================================================= */

    $(window).resize(function() {
        sw = $(window).width();
        sh = $(window).height();

        $grid = $('.project-grid').isotope({
            itemSelector: '.proj',
            layoutMode: 'fitRows',
            transitionDuration: '0.35s',
        });
    }).resize();

/* ====================== The End ====================================================================== */

}(jQuery));
