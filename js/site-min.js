jQuery(document).ready((function(e){e(".reveal-content").click((function(){e(this).hide(),e(this).parent().removeClass("hide-content")})),e(".hamburger-menu").click((function(){e(this).toggleClass("open"),e(".navigation").stop().slideToggle()})),e(".slides").slick({speed:800,adaptiveHeight:!0,fade:!0,accessibility:!1});var i=e(".blog-posts .card").size(),t=5;e(".blog-posts .card:gt(5)").hide(),i<=6&&e("#load-more").hide(),e("#load-more a").click((function(t){t.preventDefault();var o=o+6<=i?o+6:i;e(".blog-posts .card:lt("+o+")").addClass("show"),o>=i&&e("#load-more").hide()})),setTimeout((function(){e("#timeline-nav")&&e("#timeline-nav").scrollspy({animate:!0,offset:90})}),200),e("body").hasClass("template-workready-plus")&&e(window).scroll((function(){var i=e(window).scrollTop(),t=e("#timeline").offset().top-90,o=e(".footer-cta").offset().top,s=e("#timeline").height()-225;window.innerWidth>=768&&(i>t?i>o-500?(e("#timeline-nav").css("position","absolute"),e("#timeline-nav").css("top",s+"px")):(e("#timeline-nav").css("position","fixed"),e("#timeline-nav").css("top","120px")):(e("#timeline-nav").css("position","absolute"),e("#timeline-nav").css("top","60px")))}))}));