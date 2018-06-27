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
        })
        .done(function (data, textStatus, jqXHR) {
            console.log("done " + data);
            window.location = "/kategori/" + data.categoryId;
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("error " + errorThrown);
            alert("Något gick fel, det gick inte att uppdatera receptet");
        });
}

/**
 * Adds recipe to category
 */
function addRecipe(e, category) {
    e.preventDefault();
    let recipeId = category.id.substring(0, category.id.length - 12);
    let categoryId = $("#category_id").text();

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
        })
        .done(function (data, textStatus, jqXHR) {
            console.log("done ", data);
            $("#" + recipeId + "addRecipeBtn").prop("disabled", true);
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
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
        })
        .done(function (data, textStatus, jqXHR) {
            console.log("done " + data);
            window.location = "/kategori";
        })
        .fail(function (jqXHR, textStatus, errorThrown) {
            console.log("error " + errorThrown);
            alert("Något gick fel, det gick inte att ta bort receptet");
        });
}