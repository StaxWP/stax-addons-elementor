var ScrollTop = ScrollTop || {};

(function ($) {

    // USE STRICT
    "use strict";

    ScrollTop.fn = {
        init: function () {
            ScrollTop.fn.initButton();
        },

        initButton: function () {
            $('.stx-scroll-top').on('click', function (e) {
                e.preventDefault();

                $("html, body").animate({
                    scrollTop: 0
                }, 800);
                return false;
            });
        }
    };

    ScrollTop.fn.init();

})(jQuery);
