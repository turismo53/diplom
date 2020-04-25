

$(document).ready(function(){
    $('.slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2500,
        dots: true,
        nextArrow: '<i class=" next fa fa-arrow-right fa-2x" style="color:white!important; "></i>',
        prevArrow: '<i class=" prev fa fa-arrow-left fa-2x" style="color:white!important; "></i>',
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    infinite: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1
                }
            },
            {
                breakpoint: 510,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: true,
                    autoplay: false
                }
            }

        ]
    });
});

