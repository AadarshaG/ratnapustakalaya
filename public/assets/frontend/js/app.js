
$(document).ready(function () {
    $('#committeSlider').slick({
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 1,
        arrows: false,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1025,
                settings: {
                    slidesToShow: 4
                }
            },
            {
                breakpoint: 769,
                settings: {
                    slidesToShow: 3
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 2
                }
            },
        ]
    });
});

gsap.from("#left-right", { x: -100, opacity: 0, duration: 1 });

gsap.registerPlugin(ScrollTrigger);

gsap.from("#fade-down",
    {
        scrollTrigger: "#about",
        y: -100,
        opacity: 0,
        duration: 1
    });



 
