/**
 * Created by ChatNoir on 25/02/15.
 */
var documentWidth = 0;
$(document).ready(function () {


    if ($('body').hasClass('home')) {
        initHomePage();
    }

    if ($('.articleContainer').length > 0) {
        initPagination();
    }

    if($('#helloAssoForm').length > 0){
        initDon();
    }

    if ($('#mfgWidget').length > 0) {

    $('#mfgWidget').iFrameResize();
    }


    $('body').on('click' , '.windowed' , function (e) {

        e.preventDefault()

        windowpop($(this).attr('href') , 545 , 433);

    });

    $('header').on('click' , '.navButton' , function () {
        console.log('click')
        $('header > div nav').toggleClass('expanded');
        $(this).toggleClass('active');
    });

    function windowpop(url , width , height) {
        var leftPosition, topPosition;
        //Allow for borders.
        leftPosition = (window.screen.width / 2) - ((width / 2) + 10);
        //Allow for title and status bars.
        topPosition = (window.screen.height / 2) - ((height / 2) + 50);
        //Open the window.
        window.open(url , "Window2" , "status=no,height=" + height + ",width=" + width + ",resizable=yes,left=" + leftPosition + ",top=" + topPosition + ",screenX=" + leftPosition + ",screenY=" + topPosition + ",toolbar=no,menubar=no,scrollbars=no,location=no,directories=no");
    }


    $('header > div').append('<a class="navButton" href="javascript:void(0);"><span></span></a>');

    $('#menu-main .ga-tracking').attr('data-category', 'Conversion');
    $('#menu-main .ga-tracking').attr('data-action'  , 'Don') ;
    $('#menu-main .ga-tracking').attr('data-label'   , 'Bouton Du Header');

    $('#menu-footer .ga-tracking').attr('data-category', 'Conversion');
    $('#menu-footer .ga-tracking').attr('data-action'  , 'Don') ;
    $('#menu-footer .ga-tracking').attr('data-label'   , 'Lien du footer');

    $('.ga-tracking').on('click', function() {
        ga('send', {
            'hitType': 'event',          // Required.
            'eventCategory': $(this).attr('data-category'),   // Required.
            'eventAction': $(this).attr('data-action'),      // Required.
            'eventLabel': $(this).attr('data-label')
        });
    });


});



