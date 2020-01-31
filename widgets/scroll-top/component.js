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

                var btn = $(this);
                $("html, body").animate({
                    scrollTop: 0
                }, btn.data('speed'));
                return false;
            });
        }
    };

    ScrollTop.fn.init();

})(jQuery);
