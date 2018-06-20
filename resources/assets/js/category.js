$(document).ready(function () {
    $(".deleteCategory").click(function (e) {
        removeCategory(e, this);
    });
});

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