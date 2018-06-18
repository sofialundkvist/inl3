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
/******/ 	return __webpack_require__(__webpack_require__.s = 46);
/******/ })
/************************************************************************/
/******/ ({

/***/ 46:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(47);


/***/ }),

/***/ 47:
/***/ (function(module, exports) {

// Instructions and ingridients that are to be removed on submit
var instructionsRemoved = [];
var ingridientsRemoved = [];

$(document).ready(function () {
  addIngridientInput();
  addInstructionInput();

  // Add click event to already existing ingridients (when updating recipe)
  $(".remove-instruction").click(function (e) {
    removeInstruction(e, this);
  });

  // Add click event to already existing instructions (when updating recipe)
  $(".remove-ingridient").click(function (e) {
    removeIngridient(e, this);
  });

  // Add event handler to submit event on form
  $("#recipeForm").submit(function (e) {
    saveRecipe(e, this);
  });
});

function addIngridientInput() {
  $("#addIngridient").click(function (e) {
    e.preventDefault();

    // Get id of last input field
    var lastInput = getLastIngridientNr();

    // Set number for next input field
    var nextIngridient = lastInput + 1;

    // Create new input element and remove button
    var newIn = '<div class="d-flex flex-row justify-content-center col-md-12" id="ingridientRow' + nextIngridient + '"> \
        <input class="form-control col-md-11 ingridients" id="ingridient' + nextIngridient + '" \
        name="ingridients[]" type="text" placeholder="Ingrediens"></div>';
    var newInput = $(newIn);
    var removeBtn = '<button id="' + nextIngridient + 'remove" \
        class="btn btn-danger remove-ingridient col-md-1" >-</button>';
    var removeButton = $(removeBtn);

    // Add new input and remove button after last input field
    $("#ingridientRow" + lastInput).after(newInput);
    $("#ingridient" + nextIngridient).after(removeButton);

    // Add click event to the remove button on new input field
    $(".remove-ingridient").click(function (e) {
      removeIngridient(e, this);
    });
  });
}

function getLastIngridientNr() {
  var ingridients = $(".ingridients").map(function (index) {
    var number = $(this).attr("id").substring(10, $(this).attr("id").length);
    return number;
  });

  // Return id of last input field:
  return Math.max.apply(Math, ingridients);
}

/**
 * Remove ingridient from recipe
 * @param {*} event The click event
 * @param {*} removeBtn The button that has been clicked
 */
function removeIngridient(event, removeBtn) {
  event.preventDefault();
  var fieldNum = removeBtn.id.substring(0, removeBtn.id.length - 6);
  var fieldID = "#ingridientRow" + fieldNum;
  $(fieldID).remove();
}

function addInstructionInput() {
  $("#addInstruction").click(function (e) {
    e.preventDefault();

    // Get id of last input field
    var lastInput = getLastInstructionNr();

    // Set number for next input field
    var nextInstruction = lastInput + 1;

    // Create new input element and remove button
    var newIn = '<div class="d-flex flex-row justify-content-center col-md-12" id="instructionsRow' + nextInstruction + '"> \
        <input class="form-control col-md-11 instructions" id="instruction' + nextInstruction + '" \
        name="instructions[]" type="text" placeholder="Steg"></div>';
    var newInput = $(newIn);
    var removeBtn = '<button id="' + nextInstruction + 'removeBtn" \
        class="btn btn-danger remove-instruction col-md-1" >-</butt' + "on>";
    var removeButton = $(removeBtn);

    // Add new input and remove button after last input field
    $("#instructionsRow" + lastInput).after(newInput);
    $("#instruction" + nextInstruction).after(removeButton);

    // Add click event to remove button on new input field
    $(".remove-instruction").click(function (e) {
      removeInstruction(e, this);
    });
  });
}

function getLastInstructionNr() {
  var ingridients = $(".instructions").map(function (index) {
    var number = $(this).attr("id").substring(11, $(this).attr("id").length);
    return number;
  });

  // Return id of last input field:
  return Math.max.apply(Math, ingridients);
}

/**
 * Remove instruction from recipe
 * @param {} event The click event
 * @param {*} removeBtn The button that has been clicked
 */
function removeInstruction(event, removeBtn) {
  event.preventDefault();
  var fieldNum = removeBtn.id.substring(0, removeBtn.id.length - 9);
  var fieldID = "#instructionsRow" + fieldNum;
  $(fieldID).remove();
}

/**
 * Saves new recipe or updates already existing one
 */
function saveRecipe(e, form) {
  e.preventDefault();

  if (form.hasAttribute("data-recipe-id")) {
    var method = "PUT";
    var url = "/recept/" + $(form).attr("data-recipe-id");
  } else {
    var method = "POST";
    var url = "/recept";
  }

  var title = $("#recipeTitle").val();
  var portions = $("#recipePortions").val();
  var ingridients = [];
  var instructions = [];

  $('input[name^="ingridients"]').each(function () {
    ingridients.push($(this).val());
  });

  $('input[name^="instructions"]').each(function () {
    instructions.push($(this).val());
  });

  $.ajax({
    headers: {
      "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
    },
    url: url,
    method: "POST",
    data: {
      _method: method,
      ingridients: ingridients,
      instructions: instructions,
      recipeTitle: title,
      recipePortions: portions
    },
    dataType: "json"
  }).done(function (data, textStatus, jqXHR) {
    console.log("done " + data);
    window.location = "/recept/" + data.recipeId;
  }).fail(function (jqXHR, textStatus, errorThrown) {
    console.log("error " + errorThrown);
    alert("Något gick fel, det gick inte att uppdatera receptet");
  });
}

/**
 * Remove recipe
 */
function removeRecipe() {
  $("#removeRecipe").click(function (e) {
    e.preventDefault();
    var recipeId = $("#recipeId").text().trim();

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: "/recept/" + recipeId,
      method: "delete",
      dataType: "json"
    }).done(function (data, textStatus, jqXHR) {
      console.log("done " + data);
      window.location = "/recept";
    }).fail(function (jqXHR, textStatus, errorThrown) {
      console.log("error " + errorThrown);
      alert("Något gick fel, det gick inte att ta bort receptet");
    });
  });
}

/***/ })

/******/ });