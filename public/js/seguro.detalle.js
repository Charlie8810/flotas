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
/******/ 	return __webpack_require__(__webpack_require__.s = 177);
/******/ })
/************************************************************************/
/******/ ({

/***/ 177:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(178);


/***/ }),

/***/ 178:
/***/ (function(module, exports) {

$(function () {
  window.metadatosCuota = $("#detalleJSON").val().length > 0 ? JSON.parse($("#detalleJSON").val()) : new Array();

  if (metadatosCuota.length > 0) {
    $.each(metadatosCuota, function (i, e) {
      var m = moment(e.vencimientoCuota, "DD-MM-YYYY");
      var numeroCuotas = $('#_nc').val();
      var o = {
        id: e.id,
        numeroCuota: parseInt(e.numeroCuota),
        numeroCuotas: parseInt(numeroCuotas),
        montoCuota: parseInt(e.montoCuota),
        vencimientoCuota: m.format('DD/MM/YYYY'),
        estaPagada: e.estaPagada
      };
      window.metadatosCuota[i] = o;
      $('#detalle_cuotas').append($('<tr>').append($('<td>').text(e.numeroCuota + '/' + numeroCuotas)).append($('<td>').text(e.montoCuota)).append($('<td>').text(m.format('DD/MM/YYYY'))).append($('<td>').append($('<div>').addClass('switch').append($('<label>').append($('<input>').prop({ type: 'checkbox', checked: e.estaPagada }).val(i).on("click", function (e) {
        window.metadatosCuota[$(this).val()].estaPagada = $(this).is(':checked');
      })).append($('<span>').addClass('lever'))))));
    });
  }

  $("#proveedor").select2();
  $('.datepicker').datepicker({
    autoClose: true,
    format: 'dd/mm/yyyy'
  });

  $("#formSeguro").validate({
    errorElement: 'div',
    errorPlacement: function errorPlacement(error, element) {
      error.insertAfter(element);
    }
  });

  $('#formSeguro').on('submit', function (event) {
    return false;
  });

  $("#btn-store").on("click", function () {
    if ($('#formSeguro').valid()) {
      $('#formSeguro').append($('<input>').prop({ type: 'hidden', name: 'detalleCuota' }).val(JSON.stringify(metadatosCuota)));
      var idVehiculo = $('meta[name=id-vehiculo]').prop('content');
      axios({
        method: $('#formSeguro').prop("method"),
        url: $('#formSeguro').prop("action"),
        data: $('#formSeguro').serialize()
      }).then(function (response) {
        if (response.respuesta) {
          swal("Ok", response.mensaje, "success", {
            button: "Aceptar"
          }).then(function (v) {
            location.href = "/vehiculo/" + idVehiculo + "/seguro";
          });
        }
      }).catch(function (error) {
        swal("Error", 'Error al Guardar el seguro', "error", {
          button: "Aceptar"
        });
        console.log(error);
      });

      $.post($('#formSeguro').prop("action"), $('#formSeguro').serialize(), function (data) {
        if (data.respuesta) {
          swal("Ok", data.mensaje, "success", {
            button: "Aceptar"
          }).then(function (v) {
            location.href = "/vehiculo/" + idVehiculo + "/seguro";
          });
        }
      }).fail(function () {});
    }
  });

  $('#doCalcular').on('click', function (e) {

    var calculo = {
      numeroCuotas: $('#numeroCuotas').val(),
      montoCuota: $('#montoCuota').val(),
      fechaPrimeraCuota: $('#fechaPrimeraCuota').val()
    };

    var m = moment(calculo.fechaPrimeraCuota, "DD-MM-YYYY");
    $('#detalle_cuotas').html("");
    for (i = 0; i < calculo.numeroCuotas; i++) {
      var numCuota = i + 1;
      var o = {
        id: 0,
        numeroCuota: numCuota,
        numeroCuotas: parseInt(calculo.numeroCuotas),
        montoCuota: parseInt(calculo.montoCuota),
        vencimientoCuota: m.format('DD/MM/YYYY'),
        estaPagada: false
      };
      window.metadatosCuota[i] = o;
      $('#detalle_cuotas').append($('<tr>').append($('<td>').text(numCuota + '/' + calculo.numeroCuotas)).append($('<td>').text(calculo.montoCuota)).append($('<td>').text(m.format('DD/MM/YYYY'))).append($('<td>').append($('<div>').addClass('switch').append($('<label>').append($('<input>').prop({ type: 'checkbox' }).val(i).on("click", function (e) {
        window.metadatosCuota[$(this).val()].estaPagada = $(this).is(':checked');
      })).append($('<span>').addClass('lever'))))));
      m.add(1, 'M');
    }
  });
});

/***/ })

/******/ });