var StaxSlider = StaxSlider || {};

(function ($) {

    // USE STRICT
    "use strict";

    StaxSlider.fn = {
        init: function () {
            StaxSlider.fn.initSlider();
        },

        initSlider: function () {
            var mySwiper = new Swiper('.swiper-container', {
                loop: true,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            });
        }
    };

    StaxSlider.fn.init();

})(jQuery);
