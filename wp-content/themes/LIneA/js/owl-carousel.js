$(document).ready(function() {
 
  $('.webinars .owl-carousel').owlCarousel({
        items:8,
        nav: true,
        dots: false,
        loop:false,
        margin:10,
        URLhashListener:true,
        autoplayHoverPause:true,
        startPosition: 'URLHash',
        responsive:{
	        0:{
	            items:4
	        },
	        600:{
	            items:6
	        },
	        1000:{
	            items:8
	        }
        },
        navText:['next','prev']
  });

  	$(".item-div").click(function(){
    	name = $(this).find("p").text();
      if ( !$(this).find("p").hasClass("year") ) {
        speakerShow(name);
      }
  	});

  	$(".year-link").click(function(){
  		$("body").find(".year-link").removeClass("active");
  		$(this).addClass("active");
  	});

      $('.news-card .owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        nav:true,
        autoplay: true,
        nav: false,
        autoplayHoverPause: false,
        responsive:{
            0:{
                items:1
            }
        }
    })
});