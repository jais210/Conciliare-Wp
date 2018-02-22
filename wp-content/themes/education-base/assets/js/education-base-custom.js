jQuery(document).ready(function($){
    var at_window = $(window);
    /*custom ticker by @acmethemes*/
    var ticker = $('.news-notice-content'),
        ticker_first = ticker.children(':first');

    if( ticker_first.length ){
        setInterval(function() {
            if ( !ticker_first.is(":hover") ){
                ticker_first.fadeOut(function() {
                    ticker_first.appendTo(ticker);
                    ticker_first = ticker.children(':first');
                    ticker_first.fadeIn();
                });
            }
        },3000);   
    }
    
    function homeFullScreen() {

        var homeSection = $('#at-banner-slider');
        var windowHeight = at_window.outerHeight();

        if (homeSection.hasClass('home-fullscreen')) {

            $('.home-fullscreen').css('height', windowHeight);
        }
    }
    //make slider full width
    homeFullScreen();

    //window resize
    at_window.resize(function () {
        homeFullScreen();
    });

    at_window.on("load", function() {

        $('.acme-owl-carausel').show().owlCarousel({
            autoPlay : true,
            navigation : true, // Show next and prev buttons
            pagination : false, // Show next and prev buttons
            slideSpeed : 800,
            paginationSpeed : 600,
            singleItem:true,
            navigationText : ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
            addClassActive: true
        });

        /*parallax scolling*/
        $('a[href*="\\#"]').click(function(event){
            var at_offset= $.attr(this, 'href');
            var id = at_offset.substring(1, at_offset.length);
            if ( ! document.getElementById( id ) ) {
                return;
            }
            if( $( at_offset ).offset() ){
                $('html, body').animate({
                    scrollTop: $( at_offset ).offset().top-$('.at-navbar').height()
                }, 1000);
                event.preventDefault();
            }

        });
        /*bootstrap sroolpy*/
        $("body").scrollspy({target: ".navbar-fixed-top", offset: $('.at-navbar').height()+50 } );

        /*featured slider*/
        $('.acme-gallery').each(function(){
            var $masonry_boxes = $(this);
            var $container = $masonry_boxes.find('.fullwidth-row');
            $container.imagesLoaded( function(){
                $masonry_boxes.fadeIn( 'slow' );
                $container.masonry({
                    itemSelector : '.at-gallery-item'
                });
            });
            /*widget*/
            $masonry_boxes.find('.image-gallery-widget').magnificPopup({
                type: 'image',
                gallery: {
                    enabled: true
                }

            });
            $masonry_boxes.find('.single-image-widget').magnificPopup({
                type: 'image'
            });
        });

    });

    function stickyMenu() {

        var scrollTop = at_window.scrollTop();
        var offset = 0;

        if ( scrollTop > offset ) {
            $('.education-base-sticky').addClass('navbar-fixed-top');
            $('.sm-up-container').show();
        }
        else {
            $('.education-base-sticky').removeClass('navbar-fixed-top');
            $('.sm-up-container').hide();
        }
    }
    //What happen on window scroll
    stickyMenu();
    at_window.on("scroll", function (e) {
        setTimeout(function () {
            stickyMenu();
        }, 300)
    });
});

/*animation with wow*/

if(typeof WOW !== 'undefined'){
    eb_wow = new WOW({
            boxClass: 'init-animate',
            animateClass: 'animated' // default
        }
    );
    eb_wow.init();
}