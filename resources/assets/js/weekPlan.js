$(document).ready(function() {
  //removeWeekPlan();
  addRecipe();
});

/**
 * Adds recipe to week plan
 */
function addRecipe() {
  $(".addRecipeBtn").click(function(e) {
    e.preventDefault();
    let recipeId = this.id.substring(0, this.id.length - 12);
    let weekPlanId = $("#week_plan_id").text();

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: "/veckoplan/" + weekPlanId + "/recept",
      method: "POST",
      data: { recipeId: recipeId },
      dataType: "json"
    })
      .done(function(data, textStatus, jqXHR) {
        console.log("done " + data);
        $("#" + recipeId + "addRecipeBtn").prop("disabled", true);
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + errorThrown);
        alert("Något gick fel, det gick inte att lägga till receptet.");
      });
  });
}

/**
 * Remove week plan
 */
/*
function removeWeekPlan() {
  var nextIngridient = 1;
  $("#removeRecipe").click(function(e) {
    e.preventDefault();
    //
  });
}
*/
