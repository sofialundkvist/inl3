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
/******/ 	return __webpack_require__(__webpack_require__.s = 51);
/******/ })
/************************************************************************/
/******/ ({

/***/ 51:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(52);


/***/ }),

/***/ 52:
/***/ (function(module, exports) {

$(document).ready(function () {
    $("#categoryForm").submit(function (e) {
        saveCategory(e, this);
    });

    $(".deleteCategory").click(function (e) {
        removeCategory(e, this);
    });

    $(".addRecipeBtn").click(function (e) {
        addRecipe(e, this);
    });
});

/**
 * Saves new category or updates already existing one
 */
function saveCategory(e, form) {
    e.preventDefault();

    if (form.hasAttribute("data-category-id")) {
        var method = "PUT";
        var url = "/kategori/" + $(form).attr("data-category-id");
    } else {
        var method = "POST";
        var url = "/kategori";
    }

    var title = $("#categoryTitle").val();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: url,
        method: "POST",
        data: {
            _method: method,
            title: title
        },
        dataType: "json"
    }).done(function (data, textStatus, jqXHR) {
        console.log("done " + data);
        window.location = "/kategori/" + data.categoryId;
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log("error " + errorThrown);
        alert("Något gick fel, det gick inte att uppdatera receptet");
    });
}

/**
 * Adds recipe to category
 */
function addRecipe(e, category) {
    e.preventDefault();
    var recipeId = category.id.substring(0, category.id.length - 12);
    var categoryId = $("#category_id").text();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/kategori/" + categoryId + "/recept",
        method: "POST",
        data: {
            recipeId: recipeId
        },
        dataType: "json"
    }).done(function (data, textStatus, jqXHR) {
        console.log("done ", data);
        $("#" + recipeId + "addRecipeBtn").prop("disabled", true);
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log("error " + errorThrown);
        alert("Något gick fel, det gick inte att lägga till receptet.");
    });
}

/**
 * Remove category
 */
function removeCategory(e, btn) {
    e.preventDefault();

    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
        },
        url: "/kategori/" + $(btn).attr("data-category-id"),
        method: "POST",
        data: {
            _method: "DELETE"
        },
        dataType: "json"
    }).done(function (data, textStatus, jqXHR) {
        console.log("done " + data);
        window.location = "/kategori";
    }).fail(function (jqXHR, textStatus, errorThrown) {
        console.log("error " + errorThrown);
        alert("Något gick fel, det gick inte att ta bort receptet");
    });
}

/***/ })

/******/ });