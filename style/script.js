$(document).ready(function(){
    console.log(document.getElementsByTagName('body')[0]);
      $('.cardSlider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 992, // écran moyen
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768, // écran petit
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
      })
    })
    