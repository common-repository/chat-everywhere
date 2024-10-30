(function ($) {
  "use strict";

  /**
   * All of the code for your public-facing JavaScript source
   * should reside in this file.
   *
   * Note: It has been assumed you will write jQuery code here, so the
   * $ function reference has been prepared for usage within the scope
   * of this function.
   *
   * This enables you to define handlers, for when the DOM is ready:
   *
   * $(function() {
   *
   * });
   *
   * When the window is loaded:
   *
   * $( window ).load(function() {
   *
   * });
   *
   * ...and/or other possibilities.
   *
   * Ideally, it is not considered best practise to attach more than a
   * single DOM-ready or window-load handler for a particular page.
   * Although scripts in the WordPress core, Plugins and Themes may be
   * practising this, we should strive to set a better example in our own work.
   */
  $(function () {
    var isMobile = {
      Android: function () {
        return navigator.userAgent.match(/Android/i);
      },
      BlackBerry: function () {
        return navigator.userAgent.match(/BlackBerry/i);
      },
      iOS: function () {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
      },
      Opera: function () {
        return navigator.userAgent.match(/Opera Mini/i);
      },
      Windows: function () {
        return navigator.userAgent.match(/IEMobile/i);
      },
      any: function () {
        return (
          isMobile.Android() ||
          isMobile.BlackBerry() ||
          isMobile.iOS() ||
          isMobile.Opera() ||
          isMobile.Windows()
        );
      },
    };
    // console.log(ajax_object.phone_number);
    // console.log(ajax_object.message_text);
    // console.log(ajax_object.class_name);
    var whatsapp_class_name = ajax_object.whatsapp_class_name;
    var telegram_class_name = ajax_object.telegram_class_name;
    var telegram_user_name = ajax_object.telegram_user_name;
    var text = ajax_object.message_text;
    var phone = ajax_object.phone_number;
    $("." + whatsapp_class_name).on("click", function (e) {
      e.preventDefault();
      if (typeof phone === "undefined") {
        alert("Phone number is not set!");
        return;
      }
      let message = encodeURIComponent(text);
      if (isMobile.any()) {
        //mobile device
        let whatsapp_API_url = "whatsapp://send";
        window.open(
          whatsapp_API_url + "?phone=" + phone + "&text=" + message,
          "_blank"
        );
      } else {
        //desktop
        let whatsapp_API_url = "https://web.whatsapp.com/send";
        window.open(
          whatsapp_API_url + "?phone=" + phone + "&text=" + message,
          "_blank"
        );
      }
    });

    $("." + telegram_class_name).on("click", function (e) {
      e.preventDefault();
      if (typeof telegram_user_name === "undefined") {
        alert("Telegram user name is not set!");
        return;
      }      
      let telegram_API_url = "https://t.me/" + telegram_user_name;
      window.open(
        telegram_API_url,
        "_blank"
      );
    });

// <a href="https://t.me/Webintenerife" class="" rel="noopener nofollow ugc" target="_blank">Use Telegram</a>

  });
})(jQuery);
