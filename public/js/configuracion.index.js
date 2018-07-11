/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 181);
/******/ })
/************************************************************************/
/******/ ({

/***/ 181:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(182);


/***/ }),

/***/ 182:
/***/ (function(module, exports) {

$(document).ready(function () {

  $("#idMantencionDisponible").select2({ dropdownParent: $("#content-modal-mantenciones") });
  $('#table-mantenciones').DataTable({
    columnDefs: [{
      targets: 0,
      searchable: !1,
      orderable: !1,
      className: 'dataTables-checkbox-column',
      render: function render(t, e, i, n) {

        return "<a href=\"" + document.URL.replace('#!', '') + "/mantencion/" + t + "\" title=\"Modificar\" class=\"desc-icon\"><i class=\"lite material-icons\">edit</i></a>\n                    <a href=\"#!\" title=\"Eliminar\" class=\"desc-icon\"><i class=\"lite material-icons\">delete</i></a>";
      }
    }],
    language: {
      search: 'Busqueda',
      searchPlaceholder: 'Ingresa un criterio de Búsqueda'
    },
    order: [1, 'asc'],
    dom: 'ft<"footer-wrapper"l<"paging-info"ip>>',
    scrollY: '400px',
    scrollCollapse: !0,
    pagingType: 'full',
    drawCallback: function drawCallback(t) {
      var e = this.api();
      $(e.table().container()).find('.paginate_button').addClass('waves-effect'), e.table().columns.adjust();
    }
  });

  $('.desc-icon').on({
    'mouseenter': function mouseenter(event) {
      $(this).find('.material-icons').removeClass('lite').addClass('small');
    },
    'mouseleave': function mouseleave(event) {
      $(this).find('.material-icons').removeClass('small').addClass('lite');
    }
  });

  $('.accionar-tipo').on('click', function () {
    if ($(this).is(':checked')) {
      $('.por-fecha').addClass('hidden');
      $('.por-kilometraje').removeClass('hidden');
    } else {
      $('.por-fecha').removeClass('hidden');
      $('.por-kilometraje').addClass('hidden');
    }
  });

  var mdlMantenciones = M.Modal.getInstance(document.getElementById('modal-mantenciones'));
  mdlMantenciones.options.onOpenEnd = function (element, opener) {

    var _id_mantencion = $(opener).data("mantencion");
    if (typeof _id_mantencion != 'undefined') {
      //console.log('Se esta Editando ' + _id_mantencion);
      var _id_vehiculo = $('#__idVehiculo').val();
      $.getJSON("/vehiculo/" + _id_vehiculo + "/configuracion/mantencion/" + _id_mantencion, function (response) {

        //console.log(response);
        $('.accionar-tipo').prop("checked", response.tipoProgramacion === 'kilometraje');
        if ($('.accionar-tipo').is(':checked')) {
          $('.por-fecha').addClass('hidden');
          $('.por-kilometraje').removeClass('hidden');
        } else {
          $('.por-fecha').removeClass('hidden');
          $('.por-kilometraje').addClass('hidden');
        }

        $('#idMantencionDisponible').val(response.idMantencionDisponible).trigger('change');
        $('#fechaInicial').val(response.fechaInicial);
        //$('#tipoLapso').val(response.tipoLapso != null ? response.tipoLapso : ''); //.trigger('change');
        $("#tipoLapso option[value=" + response.tipoLapso + "]").prop('selected', true);
        $('#kilometrajeInicial').val(response.kilometrajeInicial);
        $('#periodoMantencion').val(response.periodoMantencion);
        $('.subire').addClass('active');
      });
    } else {
      console.log('No se esta Editando!!!!!!');
    }
  };

  mdlMantenciones.options.onCloseEnd = function () {
    $('.accionar-tipo').prop("checked", false);
    if ($('.accionar-tipo').is(':checked')) {
      $('.por-fecha').addClass('hidden');
      $('.por-kilometraje').removeClass('hidden');
    } else {
      $('.por-fecha').removeClass('hidden');
      $('.por-kilometraje').addClass('hidden');
    }

    $('#idMantencionDisponible').val('').trigger('change');
    $('#fechaInicial').val('');
    $('#kilometrajeInicial').val('');
    $('#periodoMantencion').val('');
    $('.subire').removeClass('active');
  };
});

/***/ })

/******/ });