/******/ (() => { // webpackBootstrap
/*!**********************************************************!*\
  !*** ./platform/plugins/location/resources/js/export.js ***!
  \**********************************************************/
$(function () {
  var isExporting = false;
  $(document).on('click', '.btn-export-data', function (event) {
    event.preventDefault();
    if (isExporting) {
      return;
    }
    var $this = $(event.currentTarget);
    var $content = $this.html();
    Botble.showButtonLoading($this);
    isExporting = true;
    $httpClient.make().withResponseType('blob').post($this.attr('href')).then(function (_ref) {
      var data = _ref.data;
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(data);
      a.href = url;
      a.download = $this.data('filename');
      document.body.append(a);
      a.click();
      a.remove();
      window.URL.revokeObjectURL(url);
    })["finally"](function () {
      $this.html($content);
      Botble.hideButtonLoading($this);
      isExporting = false;
    });
  });
});
/******/ })()
;