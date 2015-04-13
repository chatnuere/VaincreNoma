/**
 * Created by ChatNoir on 01/03/15.
 */

var initPagination = function () {





    $.get( "http://vaincre-noma.com/api/get_posts/", function( data ) {

        $('.article').append( "<div class='archive'><input type='hidden' class='current_page' /><input type='hidden' class='show_per_page' /><h3>Archive</h3><ul></ul><div class='page_navigation'></div></div>");


        $.each( data.posts, function( key, value ) {

            var dateFix        = value.date.split(' ')
            var date           = new Date(dateFix[0]);
            var curr_month     = date.getMonth();
            var curr_year      = date.getFullYear();
            var m_names        = new Array("Janvier", "Février", "Mars","Avril", "Mai", "Juin", "Juillet", "Août", "Septembre","Octobre", "Novembre", "Décembre");
            var articleUrl     = document.URL
            if (articleUrl.indexOf("?")>-1){
                articleUrl = articleUrl.substr(0,articleUrl.indexOf("?"));
            }
            articleUrl = articleUrl+'?title='+encodeURIComponent(value.title.replace(/ /g,"-"))+'&post='+value.id;


                $('.archive ul').append(

                    '<li>'+
                        '<a href="'+value.url+'">'+
                        '<div class="img"><img src="'+value.thumbnail_images.thumbnail.url+'" alt=""></div>'+

                        '<div class="info">'+
                        '<p>'+m_names[curr_month] + ", " + curr_year+'</p>'+
                        '<h4>'+value.title+'</h4>'+
                        '</div>'+

                        '</a>'+
                    '</li>'

                )
        });




        //how much items per page to show
        var show_per_page = 5;
//getting the amount of elements inside content div
        var number_of_items = $('.archive ul').children().size();
//calculate the number of pages we are going to have
        var number_of_pages = Math.ceil((number_of_items / show_per_page)-1);

//set the value of our hidden input fields
        $('.current_page').val(0);
        $('.show_per_page').val(show_per_page);

//now when we got all we need for the navigation let's make it '

        /*
         what are we going to have in the navigation?
         - link to previous page
         - links to specific pages
         - link to next page
         */
        var navigation_html = '';
        var current_link = 0;
        while (number_of_pages > current_link) {
            navigation_html += '<a class="page_link" href="javascript:go_to_page(' + current_link + ')" longdesc="' + current_link + '">' + (current_link + 1) + '</a>';
            current_link++;
        }
        navigation_html += '<a class="next_link" href="javascript:go_to_page(' + (number_of_pages - 1) + ');">&raquo;</a>';

        $('.page_navigation').html(navigation_html);

//add active_page class to the first page link
        $('.page_navigation .page_link:first').addClass('active_page');

//hide all the elements inside content div
        $('.archive ul').children().css('display' , 'none');

//and show the first n (show_per_page) elements
        $('.archive ul').children().slice(0 , show_per_page).css('display' , 'block');

        $("nav.archive").stick_in_parent();

    });








};

function previous() {

    new_page = parseInt($('.current_page').val()) - 1;
    //if there is an item before the current active link run the function
    if ($('.active_page').prev('.page_link').length == true) {
        go_to_page(new_page);
    }

}

function next() {
    new_page = parseInt($('.current_page').val()) + 1;
    //if there is an item after the current active link run the function
    if ($('.active_page').next('.page_link').length == true) {
        go_to_page(new_page);
    }

}
function go_to_page(page_num) {
    //get the number of items shown per page
    var show_per_page = parseInt($('.show_per_page').val());

    //get the element number where to start the slice from
    start_from = page_num * show_per_page;

    //get the element number where to end the slice
    end_on = start_from + show_per_page;

    //hide all children elements of content div, get specific items and show them
    $('.archive ul').children().css('display' , 'none').slice(start_from , end_on).css('display' , 'block');

    /*get the page link that has longdesc attribute of the current page and add active_page class to it
     and remove that class from previously active page link*/
    $('.page_link[longdesc=' + page_num + ']').addClass('active_page').siblings('.active_page').removeClass('active_page');

    //update the current page input field
    $('.current_page').val(page_num);
}