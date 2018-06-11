$(document).ready(function() {
  addIngridientInput();
  addInstructionInput();
});

function addIngridientInput() {
  $("#addIngridient").click(function(e) {
    e.preventDefault();

    // Get id of last input field
    let lastInput = getLastIngridientNr();

    // Set number for next input field
    let nextIngridient = lastInput + 1;

    // Create new input element and remove button
    var newIn =
      '<div class="d-flex flex-row justify-content-center col-md-12" id="ingridientRow' +
      nextIngridient +
      '"> \
        <input class="form-control col-md-11 ingridients" id="ingridient' +
      nextIngridient +
      '" \
        name="ingridients[]" type="text" placeholder="Ingrediens"></div>';
    var newInput = $(newIn);
    var removeBtn =
      '<button id="' +
      nextIngridient +
      'remove" \
        class="btn btn-danger remove-ingridient col-md-1" >-</button>';
    var removeButton = $(removeBtn);

    // Add new input and remove button after last input field
    $("#ingridientRow" + lastInput).after(newInput);
    $("#ingridient" + nextIngridient).after(removeButton);

    // Add click event to the remove button on new input field
    $(".remove-ingridient").click(function(e) {
      e.preventDefault();
      let fieldNum = this.id.substring(0, this.id.length - 6);
      console.log("number of remove button: " + fieldNum);
      var fieldID = "#ingridientRow" + fieldNum;
      $(this).remove();
      $(fieldID).remove();
    });
  });
}

function getLastIngridientNr() {
  let ingridients = $(".ingridients").map(function(index) {
    let number = $(this)
      .attr("id")
      .substring(10, $(this).attr("id").length);
    return number;
  });

  // Return id of last input field:
  return Math.max.apply(Math, ingridients);
}

function addInstructionInput() {
  $("#addInstruction").click(function(e) {
    e.preventDefault();

    // Get id of last input field
    let lastInput = getLastInstructionNr();

    // Set number for next input field
    let nextInstruction = lastInput + 1;

    // Create new input element and remove button
    var newIn =
      '<div class="d-flex flex-row justify-content-center col-md-12" id="instructionsRow' +
      nextInstruction +
      '"> \
        <input class="form-control col-md-11 instructions" id="instruction' +
      nextInstruction +
      '" \
        name="instructions[]" type="text" placeholder="Steg"></div>';
    var newInput = $(newIn);
    var removeBtn =
      '<button id="' +
      nextInstruction +
      'removeBtn" \
        class="btn btn-danger remove-instruction col-md-1" >-</butt' +
      "on>";
    var removeButton = $(removeBtn);

    // Add new input and remove button after last input field
    $("#instructionsRow" + lastInput).after(newInput);
    $("#instruction" + nextInstruction).after(removeButton);

    // Add click event to remove button on new input field
    $(".remove-instruction").click(function(e) {
      e.preventDefault();
      let fieldNum = this.id.substring(0, this.id.length - 9);
      var fieldID = "#instructionsRow" + fieldNum;
      $(this).remove();
      $(fieldID).remove();
      $("#instr" + fieldNum + "Label").remove();
    });
  });
}

function getLastInstructionNr() {
  let ingridients = $(".instructions").map(function(index) {
    let number = $(this)
      .attr("id")
      .substring(11, $(this).attr("id").length);
    return number;
  });

  // Return id of last input field:
  return Math.max.apply(Math, ingridients);
}

/**
 * Remove recipe
 */
function removeRecipe() {
  var nextIngridient = 1;
  $("#removeRecipe").click(function(e) {
    e.preventDefault();
    let weekPlanId = $("#recipeId")
      .text()
      .trim();

    console.log(weekPlanId);

    $.ajax({
      headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
      },
      url: "/recipe/" + weekPlanId,
      method: "delete",
      dataType: "json"
    })
      .done(function(data, textStatus, jqXHR) {
        console.log("done " + data);
        window.location = "/recept";
      })
      .fail(function(jqXHR, textStatus, errorThrown) {
        console.log("error " + errorThrown);
        alert("Något gick fel, det gick inte att ta bort veckoplanen");
      });
  });
}
