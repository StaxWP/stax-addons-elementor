var STAXAdmin = STAXAdmin || {};

(function ($) {

    // USE STRICT
    "use strict";

    STAXAdmin.fn = {
        init: function () {
            STAXAdmin.fn.toggleWidget();
        },

        toggleWidget: function () {
            $('.stax-toggle-widget-status').on('change', function () {
                var form = $('#modules-form');

                $.ajax({
                    method: 'post',
                    url: form.attr('action'),
                    data: form.serialize(),
                    success: function (response) {

                    }
                });
            });
        }
    };

    STAXAdmin.fn.init();

})(jQuery);
