var initSlider=function(){$(".styledSlider").each(function(){var e='<span class="ui-slider-handle ">&lt; '+$(this).find('input[type="range"]').val()+"€ &gt;</span>",i,a,t=$(this),l=document.getElementById(t.parent().find("video").attr("id"));$(this).find('input[type="range"]').rangeslider({polyfill:!1,onInit:function(i,a){this.$handle.append($(e)),this.update()},onSlide:function(e,i){var a=$(".ui-slider-handle ",this.$range);a.length&&(a[0].innerHTML="&lt; "+Math.floor(i)+"€ &gt;",4===l.readyState&&updateVideo(l,t,i))}})})},updateVideo=function(e,i,a){var t=i.find("input").attr("max"),l=100*(a/t),n=i.parent().attr("id");console.log(n),100==l?("videoMap"==n&&$("#videoMap ul").addClass("active"),l=99):"videoMap"==n&&$("#videoMap ul").removeClass("active"),e.currentTime=l*e.duration/100},initHomePage=function(){function e(e){var i="",a='<ul class="mobileLink">';for(var t in e.posts){var l=e.posts[t].thumbnail_images.full.url,n=e.posts[t].date.split(" "),r=new Date(n[0]),d=e.posts[t].title,o=e.posts[t].excerpt,s=e.posts[t].url,c=e.posts[t].id,p=r.getMonth(),u=r.getFullYear(),v=r.getUTCDate(),h=e.posts[t].url;h=s;var f=new Array("Janvier","Février","Mars","Avril","Mai","Juin","Juillet","Août","Septembre","Octobre","Novembre","Décembre");i+='<div class="articleCarousel item"><a href="'+h+'" class="simulatedCover"><img src="'+l+'" alt=""></a><div class="content"><nav class="social"><p>Partager</p><ul><li><a class="windowed"  href="http://twitter.com/intent/tweet/?url='+s+'"><i class="icon-twitter"></i></a></li><!----><li><a class="windowed"  href=https://www.facebook.com/sharer/sharer.php?u="'+s+'"><i class="icon-facebook"></i></a></li><!----><li><a href="mailto:?subject='+d+"&body="+h+'"><i class="icon-mail"></i></a></li></ul></nav><p class="date">'+f[parseInt(p)]+", "+u+'</p><h4><a href="'+h+'">'+d+'</a></h4><div class="preview"><a href="'+h+'">'+o+"</a></<div></div></div></div>",3>t&&(a+='<li><a href="'+s+'"><p>'+f[parseInt(p)]+" "+v+", "+u+"</p><h4>"+d+'</h4><i class="icon-right-open-big"></i></a></li>')}$(".owl-carousel").html(i),$("#archiveCarousel").append(a+"</ul>")}initSlider(),$(window).width()>800?(video1Timer=setInterval(function(){var e=document.getElementById("videotest");4===e.readyState&&(updateVideo(e,$("#child").find(".styledSlider"),$("#child").find("input").val()),clearInterval(video1Timer),$("#child").find(".loader").fadeOut())},500),video2Timer=setInterval(function(){var e=document.getElementById("MapChildrens");4===e.readyState&&(updateVideo(e,$("#videoMap").find(".styledSlider"),$("#videoMap").find("input").val()),clearInterval(video2Timer),$("#videoMap").find(".loader").fadeOut())},500)):$(".loader").fadeOut(0),$(".owl-carousel").owlCarousel({jsonPath:window.location.href+"api/get_posts/",jsonSuccess:e,items:3,lazyLoad:!0,navigation:!0,rewindNav:!1})};