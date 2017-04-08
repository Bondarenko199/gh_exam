/**
 * Created by admin on 21.03.2017.
 */
jQuery(function($){
    $(document).ready(function(){
        $('#owl').owlCarousel({
            items: 1,
            margin: 0,
            loop: true,
            stagePadding: 0,
            startPosition: 1,
            nav: true,
            dots: true,
            dotsEach: true,
            navText: [],
            smartSpeed: 1000,
            responsive: {
                0 : {

                },
                575 : {

                },
                767 : {

                },
                991 : {

                },
                1200 : {

                }
            }
        });
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

                },
                767 : {

                },
                991 : {

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
    });
});