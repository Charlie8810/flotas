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
/******/ 	return __webpack_require__(__webpack_require__.s = 183);
/******/ })
/************************************************************************/
/******/ ({

/***/ 183:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(184);


/***/ }),

/***/ 184:
/***/ (function(module, exports) {

$(function () {

    $("#idMantencionDisponible").select2();

    //Initial
    if ($('.accionar-tipo').is(':checked')) {
        $('.por-fecha').addClass('hidden');
        $('.por-kilometraje').removeClass('hidden');
    } else {
        $('.por-fecha').removeClass('hidden');
        $('.por-kilometraje').addClass('hidden');
    }

    $('.accionar-tipo').on('change', function () {
        if ($(this).is(':checked')) {
            $('.por-fecha').addClass('hidden');
            $('.por-kilometraje').removeClass('hidden');
        } else {
            $('.por-fecha').removeClass('hidden');
            $('.por-kilometraje').addClass('hidden');
        }
    });

    $('.accion').on('click', function () {
        console.log('action', $('#form-mantencion').prop('action'));
        console.log('method', $('#form-mantencion').prop('method'));
        console.log('data', $('#form-mantencion').serialize());

        axios({
            method: $('#form-mantencion').prop("method"),
            url: $('#form-mantencion').prop("action"),
            data: $('#form-mantencion').serialize()
        }).then(function (response) {
            if (response.respuesta) {
                swal("Ok", response.mensaje, "success", {
                    button: "Aceptar"
                }).then(function (v) {
                    location.href = '/vehiculo/' + idVehiculo + '/seguro';
                });
            }
        }).catch(function (error) {
            swal("Error", 'Error al Guardar el seguro', "error", {
                button: "Aceptar"
            });
            console.log(error);
        });
    });
});

/***/ })

/******/ });