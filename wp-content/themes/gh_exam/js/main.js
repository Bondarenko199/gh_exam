/**
 * Created by admin on 21.03.2017.
 */
jQuery(function($){
    $(document).ready(function(){
        $('#owl-2').owlCarousel({
            items: 4,
            margin: 0,
            loop: true,
            stagePadding: 0,
            startPosition: 1,
            nav: false,
            dots: false,
            dotsEach: false,
            navText: [],
            smartSpeed: 1000,
            responsive: {
                0 : {

                },
                575 : {
                    items: 1,
                },
                767 : {
                    items: 2,
                },
                991 : {
                    items: 3,
                },
                1200 : {

                }
            }
        });

        var $grid = $('.grid').isotope({
            layoutMode: 'fitRows',
            itemSelector: '.grid-item',
        });

        $('.btn-container').on( 'click', 'button', function() {
            var filterValue = $( this ).attr('data-filter');
            $grid.isotope({ filter: filterValue });
        });

        $('.btn-container').each( function( i, buttonGroup ) {
            var $buttonGroup = $( buttonGroup );
            $buttonGroup.on( 'click', 'button', function() {
                $buttonGroup.find('.is-checked').removeClass('is-checked');
                $( this ).addClass('is-checked');
            });
        });

        $("#scroll").click(function () {
            var elementClick = $(this).attr("href");
            var destination = $(elementClick).offset().top;
            jQuery("html:not(:animated),body:not(:animated)").animate({scrollTop: destination}, 800);
            return false;
        });
    });
});