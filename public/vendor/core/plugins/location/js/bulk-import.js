/******/ (() => { // webpackBootstrap
/*!***************************************************************!*\
  !*** ./platform/plugins/location/resources/js/bulk-import.js ***!
  \***************************************************************/
function _toConsumableArray(r) { return _arrayWithoutHoles(r) || _iterableToArray(r) || _unsupportedIterableToArray(r) || _nonIterableSpread(); }
function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }
function _unsupportedIterableToArray(r, a) { if (r) { if ("string" == typeof r) return _arrayLikeToArray(r, a); var t = {}.toString.call(r).slice(8, -1); return "Object" === t && r.constructor && (t = r.constructor.name), "Map" === t || "Set" === t ? Array.from(r) : "Arguments" === t || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(t) ? _arrayLikeToArray(r, a) : void 0; } }
function _iterableToArray(r) { if ("undefined" != typeof Symbol && null != r[Symbol.iterator] || null != r["@@iterator"]) return Array.from(r); }
function _arrayWithoutHoles(r) { if (Array.isArray(r)) return _arrayLikeToArray(r); }
function _arrayLikeToArray(r, a) { (null == a || a > r.length) && (a = r.length); for (var e = 0, n = Array(a); e < a; e++) n[e] = r[e]; return n; }
$(function () {
  var container = $(document).find('.bulk-import');
  var $form = container.find('.form-bulk-import');
  var $button = $form.find('button[type="submit"]');
  var failedRows = [];
  var _validateData = function validateData(file) {
    var offset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var limit = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 1000;
    if (offset === 0) {
      container.find('.bulk-import-message').text($button.data('validating-text'));
    }
    $httpClient.make().post($form.data('validate-url'), {
      file: file,
      offset: offset,
      limit: limit
    }).then(function (_ref) {
      var response = _ref.data;
      var data = response.data,
        message = response.message;
      if (data && data.count > 0) {
        container.find('.bulk-import-message').text(message);
        _validateData(file, data.offset);
        failedRows = [].concat(_toConsumableArray(failedRows), _toConsumableArray(data.failed));
      } else {
        if (failedRows.length > 0) {
          var $listing = container.find('#imported-listing');
          var $show = container.find('.show-errors');
          var failureTemplate = $(document).find('#failure-template').html();
          var result = '';
          failedRows.forEach(function (val) {
            result += failureTemplate.replace('__row__', val.row).replace('__errors__', val.errors.join(', '));
          });
          $show.show();
          container.find('.main-form-message').show();
          $listing.show().html(result);
          failedRows = [];
          Botble.hideLoading($form);
          Botble.hideButtonLoading($button);
          dropzone.removeAllFiles();
          container.find('.bulk-import-message').hide();
        } else {
          _importData(file);
        }
      }
    });
  };
  var _importData = function importData(file) {
    var offset = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
    var limit = arguments.length > 2 ? arguments[2] : undefined;
    if (offset === 0) {
      container.find('.bulk-import-message').text($button.data('importing-text'));
      Botble.showButtonLoading($button);
      Botble.showLoading($form);
    }
    $httpClient.make().post($form.data('import-url'), {
      file: file,
      offset: offset,
      limit: limit
    }).then(function (_ref2) {
      var response = _ref2.data;
      var data = response.data,
        message = response.message;
      if (data && data.count > 0) {
        _importData(file, data.offset);
      } else {
        Botble.showSuccess(message);
        if (data.total_message) {
          container.find('.main-form-message').show();
          container.find('.bulk-import-message').removeClass('alert-info').addClass('alert-success').text(data.total_message);
          dropzone.removeAllFiles();
          Botble.hideLoading($form);
          Botble.hideButtonLoading($button);
        }
      }
    });
  };
  var dropzone = new Dropzone('.location-dropzone', {
    url: $form.data('upload-url'),
    method: 'post',
    headers: {
      'X-CSRF-TOKEN': $form.find('input[name=_token]').val()
    },
    previewTemplate: $(document).find('#preview-template').html(),
    autoProcessQueue: false,
    chunking: true,
    chunkSize: 1048576,
    acceptedFiles: $form.find('.location-dropzone').data('mimetypes'),
    maxFiles: 1,
    maxfilesexceeded: function maxfilesexceeded(file) {
      this.removeFile(file);
    },
    success: function success(file, response) {
      var data = response.data,
        message = response.message;
      if (data && data.file_path) {
        _validateData(data.file_path);
      }
    }
  });
  $(document).on('submit', $form, function (event) {
    event.preventDefault();
    var $button = $form.find('button[type=submit]');
    Botble.showLoading($form);
    Botble.showButtonLoading($button);
    container.find('.bulk-import-message').removeClass('alert-success').addClass('alert-info').hide();
    container.find('.show-errors').hide();
    if (dropzone.getQueuedFiles().length > 0) {
      dropzone.processQueue();
    }
    dropzone.on('sending', function () {
      container.find('.bulk-import-message').show().text($button.data('uploading-text'));
    });
    dropzone.on('error', function (file, message) {
      Botble.showError(message.message);
    });
  });
  var isDownloadingTemplate = false;
  $(document).on('click', '.download-template', function (event) {
    event.preventDefault();
    if (isDownloadingTemplate) {
      return;
    }
    var $this = $(event.currentTarget);
    var extension = $this.data('extension');
    var $content = $this.html();
    $this.html($this.data('downloading'));
    $this.addClass('text-secondary');
    isDownloadingTemplate = true;
    $httpClient.make().withResponseType('blob').post($this.data('url'), {
      extension: extension
    }).then(function (_ref3) {
      var data = _ref3.data;
      var a = document.createElement('a');
      var url = window.URL.createObjectURL(data);
      a.href = url;
      a.download = $this.data('filename');
      document.body.append(a);
      a.click();
      a.remove();
      window.URL.revokeObjectURL(url);
    })["finally"](function () {
      setTimeout(function () {
        $this.html($content);
        $this.removeClass('text-secondary');
        isDownloadingTemplate = false;
      }, 2000);
    });
  });
  var $availableRemoteLocations = $(document).find('#available-remote-locations');
  if ($availableRemoteLocations.length) {
    var getRemoteLocations = function getRemoteLocations() {
      $httpClient.make().get($availableRemoteLocations.data('url')).then(function (_ref4) {
        var response = _ref4.data;
        $availableRemoteLocations.html(response.data);
      });
    };
    getRemoteLocations();
    $(document).on('click', '.btn-import-location-data', function (event) {
      event.preventDefault();
      $(document).find('.button-confirm-import').data('url', $(this).data('url'));
      $(document).find('.modal-confirm-import').modal('show');
    });
    $(document).find('.button-confirm-import').on('click', function (event) {
      event.preventDefault();
      var _self = $(event.currentTarget);
      Botble.showButtonLoading(_self);
      $httpClient.make().post(_self.data('url')).then(function (_ref5) {
        var data = _ref5.data;
        _self.closest('.modal').modal('hide');
        return Botble.showSuccess(data.message);
      })["finally"](function () {
        Botble.hideButtonLoading(_self);
      });
    });
  }
});
/******/ })()
;