/******/ (() => { // webpackBootstrap
/*!****************************************************************!*\
  !*** ./platform/plugins/newsletter/resources/js/newsletter.js ***!
  \****************************************************************/
$(function () {
  var $newsletterPopup = $('#newsletter-popup');
  var dontShowAgain = function dontShowAgain(time) {
    var date = new Date();
    date.setTime(date.getTime() + time);
    document.cookie = "newsletter_popup=1; expires=".concat(date.toUTCString(), "; path=/");
  };
  if ($newsletterPopup.length > 0) {
    if (document.cookie.indexOf('newsletter_popup=1') === -1) {
      setTimeout(function () {
        $newsletterPopup.modal('show');
      }, $newsletterPopup.data('delay') * 1000);
    }
    $newsletterPopup.on('show.bs.modal', function () {
      var dialog = $newsletterPopup.find('.modal-dialog');
      dialog.css('margin-top', Math.max(0, ($(window).height() - dialog.height()) / 2) / 2);
    }).on('hide.bs.modal', function () {
      var checkbox = $newsletterPopup.find('form').find('input[name="dont_show_again"]');
      if (checkbox.is(':checked')) {
        dontShowAgain(3 * 24 * 60 * 60 * 1000); // 1 day
      } else {
        dontShowAgain(60 * 60 * 1000); // 1 hour
      }
    });
    document.addEventListener('newsletter.subscribed', function () {
      return dontShowAgain();
    });
  }
});
/******/ })()
;