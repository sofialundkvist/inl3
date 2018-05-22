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
/******/ 	return __webpack_require__(__webpack_require__.s = 45);
/******/ })
/************************************************************************/
/******/ ({

/***/ 45:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(46);


/***/ }),

/***/ 46:
/***/ (function(module, exports) {

$(document).ready(function () {
    addIngridientInput();
    addInstructionInput();
});

function addIngridientInput() {
    var nextIngridient = 1;
    $("#addIngridient").click(function (e) {
        e.preventDefault();

        // Get id of last input field:
        var lastInput = nextIngridient;

        // Set number for next input field
        nextIngridient = nextIngridient + 1;

        // Create new input element and remove button
        var newIn = '<div class="d-flex flex-row justify-content-center col-md-12" id="ingridientRow' + nextIngridient + '"> \
        <input class="form-control col-md-11" id="ingridient' + nextIngridient + '" \
        name="ingridients[]" type="text" placeholder="Ingrediens"></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="' + nextIngridient + 'remove" \
        class="btn btn-danger remove-ingridient col-md-1" >-</button>';
        var removeButton = $(removeBtn);

        // Add new input and remove button after last input field
        $("#ingridientRow" + lastInput).after(newInput);
        $("#ingridient" + nextIngridient).after(removeButton);

        // Add click event to the remove button on new input field
        $('.remove-ingridient').click(function (e) {
            e.preventDefault();
            var fieldNum = this.id.substring(0, this.id.length - 6);
            var fieldID = "#ingridient" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });
    });
}

function addInstructionInput() {
    var nextInstruction = 1;
    $("#addInstruction").click(function (e) {
        e.preventDefault();

        // Get id of last input field:
        var lastInput = nextInstruction;

        // Set number for next input field
        nextInstruction = nextInstruction + 1;

        // Create new input element and remove button
        var newIn = '<div class="d-flex flex-row justify-content-center col-md-12" id="instructionsRo' + 'w' + nextInstruction + '"> \
        <input class="form-control col-md-11" id="instruction' + nextInstruction + '" \
        name="instructions[]" type="text" placeholder="Steg"></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="' + nextInstruction + 'removeBtn" \
        class="btn btn-danger remove-instruction col-md-1" >-</butt' + 'on>';
        var removeButton = $(removeBtn);

        // Add new input and remove button after last input field
        $("#instructionsRow" + lastInput).after(newInput);
        $("#instruction" + nextInstruction).after(removeButton);

        // Add click event to remove button on new input field
        $('.remove-instruction').click(function (e) {
            e.preventDefault();
            var fieldNum = this.id.substring(0, this.id.length - 9);
            var fieldID = "#instruction" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
            $("#instr" + fieldNum + "Label").remove();
        });
    });
}

/***/ })

/******/ });