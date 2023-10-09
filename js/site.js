jQuery(document).ready(function($) {

  $('.reveal-content').click(function(){
    $(this).hide();
    $(this).parent().removeClass('hide-content');
  });

	/* Hamburger Menu: Mobile */
	$('.hamburger-menu').click(function(){
		$(this).toggleClass('open');
		$('.navigation').stop().slideToggle();
	});



	/* Slick.js Settings: http://kenwheeler.github.io/slick/ */
	// $('.slides').slick({
	//     speed: 800,
    //     adaptiveHeight: true,
    //     fade: true,
    //     accessibility: false
	// });

    $('.two-third-image-slider__slider').slick({
        speed: 800,
        adaptiveHeight: true,
        fade: true,
        accessibility: false
    });

    $('.image-slider-information__slider').slick({
        speed: 800,
        adaptiveHeight: true,
        fade: true,
        accessibility: false
    });


    //FAQ Accordion script
    $('#faq_accordion').accordion({
        active: true,
        collapsible: true,
        heightStyle: 'content',
        header: '> .accordion__list-item > .accordion__list-title'
    });


	/* Load more posts: https://jsfiddle.net/cse_tushar/6FzSb/ */
	var totalPostQuantity = $(".blog-posts .card").size();
    var postQuantity = 5;

    $('.blog-posts .card:gt('+postQuantity+')').hide();

    if (totalPostQuantity <= 6) {
    	$('#load-more').hide();
    }

    $('#load-more a').click(function(e) {
    	e.preventDefault();
        var postQuantity = (postQuantity + 6 <= totalPostQuantity) ? postQuantity + 6 : totalPostQuantity;
        $('.blog-posts .card:lt('+postQuantity+')').addClass('show');

        if (postQuantity >= totalPostQuantity) {
	    	$('#load-more').hide();
	    }
    });

    /* Timeline Settings */

    setTimeout(function(){
        if($('#timeline-nav')) {
            $('#timeline-nav').scrollspy({
                animate: true,
                offset: 90
            });
        }
    }, 200);



    if($('body').hasClass('template-workready-plus')){
        $(window).scroll(function() {
          var scrollPos = $(window).scrollTop();
          var timelineOffset = ($('#timeline').offset().top - 90);
          var afterTimelineOffset = $('.footer-cta').offset().top;
          var timelineBottomOffset = $('#timeline').height() - 225;

          if(window.innerWidth >= 768) {
            if(scrollPos > timelineOffset ){
              if( scrollPos > (afterTimelineOffset - (500) ) ) {
                $('#timeline-nav').css('position', 'absolute');
                $('#timeline-nav').css('top', (timelineBottomOffset) + 'px');
              } else {
                $('#timeline-nav').css('position', 'fixed');
                $('#timeline-nav').css('top', '120px');
              }
            } else {
              $('#timeline-nav').css('position', 'absolute');
              $('#timeline-nav').css('top', '60px');
            }
          }
        });
      }
});
