/**
 * Created by ChatNoir on 26/02/15.
 */
var initSlider = function () {
    $(".styledSlider").each(function () {
        var valueBubble = '<span class="ui-slider-handle ga-tracking" data-category="Information" data-action="Slider Video" data-label= "' + $(this).attr("id") + '" >&lt; ' + $(this).find('input[type="range"]').val() + '€ &gt;</span>', tempPosition, position;
        var self = $(this);
        var video = document.getElementById(self.parent().find('video').attr('id'));
        $(this).find('input[type="range"]').rangeslider({
            polyfill : false ,
            onInit   : function (pos , value) {
                this.$handle.append($(valueBubble));
                this.update();
            } ,
            onSlide  : function (pos , value) {
                var $valueBubble = $('.ui-slider-handle ' , this.$range);
                if ($valueBubble.length) {
                    $valueBubble[0].innerHTML = '&lt; ' + Math.floor(value) + '€ &gt;';
                    if (video.readyState === 4 ) {
                    updateVideo(video , self , value);
                    }
                }
            }
        });
    });
};

var updateVideo = function (object , slider , value) {

    var max = slider.find('input').attr('max');
    var percentage = 100 * (value / max);
    var id = slider.parent().attr('id');


    if (percentage ==100 ){
        if (id == 'videoMap'){
            $('#videoMap ul').addClass('active');
        }
        percentage = 99;
    }else{
        if (id == 'videoMap'){
            $('#videoMap ul').removeClass('active');
        }
    }
    object.currentTime = ((percentage * object.duration) / 100)
};


var initHomePage = function () {

    initSlider();

    if($(window).width() > 800 ){
    video1Timer = setInterval(function () {
       var video = document.getElementById('videotest')
        if ( video.readyState === 4 ) {
            updateVideo(video , $('#child').find('.styledSlider') , $('#child').find('input').val());
            clearInterval(video1Timer);
            $('#child').find('.loader').fadeOut();
        }
    }, 500);

    video2Timer = setInterval(function () {
        var video = document.getElementById('MapChildrens')
        if ( video.readyState === 4 ) {
            updateVideo(video , $('#videoMap').find('.styledSlider') , $('#videoMap').find('input').val());
            clearInterval(video2Timer);
            $('#videoMap').find('.loader').fadeOut();
        }
    }, 500);
    }else{
        $('.loader').fadeOut(0);
    }

    /*
     *  Fonction get articles
     * */
    $(".owl-carousel").owlCarousel({
        jsonPath    : window.location.href + 'api/get_posts/' ,
        jsonSuccess : customDataSuccess ,
        items       : 3 ,
        lazyLoad    : true ,
        navigation  : true ,
        rewindNav   : false
    });

    function customDataSuccess(data) {
        var content = "";
        var content2 = '<ul class="mobileLink">';
        for (var i in data["posts"]) {
            var img = data["posts"][i].thumbnail_images.full.url;
            var date = data["posts"][i].date.split(' ')
            var date2 = new Date(date[0]);
            var articleTitle = data["posts"][i].title;
            var articlePreview = data["posts"][i].excerpt;
            var sharingUrl = data["posts"][i].url;
            var postId = data["posts"][i].id
            var curr_month = date2.getMonth();
            var curr_year = date2.getFullYear();
            var curr_day =  date2.getUTCDate();
            var articleUrl = data["posts"][i].url;
            articleUrl = sharingUrl;
            var m_names = new Array("Janvier" , "Février" , "Mars" , "Avril" , "Mai" , "Juin" , "Juillet" , "Août" , "Septembre" , "Octobre" , "Novembre" , "Décembre");

            content += '<div class="articleCarousel item">' +
                '<a href="' + articleUrl + '" class="simulatedCover">' +
                '<img src="' + img + '" alt="">' +
                '</a>' +
                '<div class="content">' +
                '<nav class="social">' +
                '<p>Partager</p>' +
                '<ul>' +
                '<li><a class="windowed ga-tracking" data-category="social" data-action="Partager" data-label="Twitter"   href="http://twitter.com/intent/tweet/?url=' + sharingUrl + '"><i class="icon-twitter"></i></a></li><!--' +
                '--><li><a class="windowed ga-tracking" data-category="social" data-action="Partager" data-label="Facebook"   href=https://www.facebook.com/sharer/sharer.php?u="' + sharingUrl + '"><i class="icon-facebook"></i></a></li><!--' +
                '--><li><a class="ga-tracking" data-category="social" data-action="Partager" data-label="Mail"  href="mailto:?subject=' + articleTitle + '&body=' + articleUrl + '"><i class="icon-mail"></i></a></li>' +
                '</ul>' +
                '</nav>' +
                '<p class="date">' + m_names[parseInt(curr_month)] + ", " + curr_year + '</p>' +
                '<h4><a href="' + articleUrl + '">' + articleTitle + '</a></h4>' +

                '<div class="preview"><a href="' + articleUrl + '">' + articlePreview + '</a></<div></div></div></div>'


            if(i<3){
                 content2 += '<li><a href="'+sharingUrl+'"><p>' + m_names[parseInt(curr_month)] +' ' +curr_day + ", " + curr_year + '</p><h4>' + articleTitle + '</h4><i class="icon-right-open-big"></i></a></li>';

            }
        }

        $(".owl-carousel").html(content);
        $("#archiveCarousel").append(content2+'</ul>');
    }


};