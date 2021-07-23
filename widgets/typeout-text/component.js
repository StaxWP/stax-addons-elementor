var TypedoutText = TypedoutText || {};

(function ($) {
  // USE STRICT
  "use strict";

  TypedoutText.fn = {
    init: function () {
      TypedoutText.fn.init();
    },

    init: function () {
      $(".stx-typeout-text-wrapper").each(function () {
        TypedoutText.fn.initItem($(this));
      });
    },

    initItem: function ($currentItem) {
      var typeout = $currentItem.find(".stx-typeout"),
        strings = $currentItem.data("strings"),
        cursor =
          typeof $currentItem.data("cursor") !== "undefined"
            ? $currentItem.data("cursor")
            : "";

      typeout.each(function () {
        var $this = $(this),
          options = {
            strings: strings,
            typeSpeed: 90,
            backDelay: 700,
            loop: true,
            contentType: "text",
            loopCount: false,
            cursorChar: cursor,
          };

        if (!$this.hasClass("stx--initialized")) {
          var typed = new Typed($this[0], options);
          $this.addClass("stx--initialized");
        }
      });
    },
  };

  TypedoutText.fn.init();
})(jQuery);
