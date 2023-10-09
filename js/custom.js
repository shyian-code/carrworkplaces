$(document).on('ready', function () {
    let acc = document.getElementsByClassName("accordion__list-title");
    let i;

    for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var panel = this.nextElementSibling;
            if (panel.style.maxHeight) {
                panel.style.maxHeight = null;
            } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
            }
        });
    }


    $('.team-member-slider__slider').slick({
        // slide: '.team-member-slider__slider-item',
        slidesToShow: 3,
        slidesToScroll: 1,
        rows: 0,
        variableWidth: true,
        dots: true,
        infinite: true,
        centerMode: true,
        speed: 400,
        adaptiveHeight: true,
        // fade: true,
        // accessibility: false,
        // cssEase: 'linear',
        responsive: [
            {
                breakpoint: 1024,
                settings:{
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 640,
                settings: {
                    slidesToShow: 1,
                }
            },
        ]
    });

    document.getElementsByClassName("ui-datepicker-trigger").src="../img/calendar-icon.svg";
});
