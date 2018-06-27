$(document).ready(function () {
  $(".addRecipeBtn").click(function (e) {
    addRecipe(e, this);
  });
  $("#removeWeekPlan").click(function (e) {
    removeWeekPlan(e);
  });
});

/**
 * Adds recipe to week plan
 */
function addRecipe(e, weekPlan) {
  e.preventDefault();
  let recipeId = weekPlan.id.substring(0, weekPlan.id.length - 12);
  let weekPlanId = $("#week_plan_id").text();

  $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: "/veckoplan/" + weekPlanId + "/recept",
      method: "POST",
      data: {
        recipeId: recipeId
      },
      dataType: "json"
    })
    .done(function (data, textStatus, jqXHR) {
      console.log("done " + data);
      $("#" + recipeId + "addRecipeBtn").prop("disabled", true);
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      console.log("error " + errorThrown);
      alert("Något gick fel, det gick inte att lägga till receptet.");
    });
}

function removeWeekPlan(e) {
  e.preventDefault();
  let weekPlanId = $("#week_plan_id")
    .text()
    .trim();

  $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: "/veckoplan/" + weekPlanId,
      method: "POST",
      data: {
        _method: "DELETE"
      },
      dataType: "json"
    })
    .done(function (data, textStatus, jqXHR) {
      console.log("done " + data);
      window.location = "/veckoplan";
    })
    .fail(function (jqXHR, textStatus, errorThrown) {
      console.log("error " + errorThrown);
      alert("Något gick fel, det gick inte att ta bort veckoplanen");
    });
}