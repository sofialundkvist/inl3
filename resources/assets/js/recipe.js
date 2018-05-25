$(document).ready(function() {
  addIngridientInput();
  addInstructionInput();
});

function addIngridientInput() {
  var nextIngridient = 1;
  $("#addIngridient").click(function(e) {
    e.preventDefault();

    // Get id of last input field:
    var lastInput = nextIngridient;

    // Set number for next input field
    nextIngridient = nextIngridient + 1;

    // Create new input element and remove button
    var newIn =
      '<div class="d-flex flex-row justify-content-center col-md-12" id="ingridientRow' +
      nextIngridient +
      '"> \
        <input class="form-control col-md-11" id="ingridient' +
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
      var fieldID = "#ingridient" + fieldNum;
      $(this).remove();
      $(fieldID).remove();
    });
  });
}

function addInstructionInput() {
  var nextInstruction = 1;
  $("#addInstruction").click(function(e) {
    e.preventDefault();

    // Get id of last input field:
    var lastInput = nextInstruction;

    // Set number for next input field
    nextInstruction = nextInstruction + 1;

    // Create new input element and remove button
    var newIn =
      '<div class="d-flex flex-row justify-content-center col-md-12" id="instructionsRo' +
      "w" +
      nextInstruction +
      '"> \
        <input class="form-control col-md-11" id="instruction' +
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
      var fieldID = "#instruction" + fieldNum;
      $(this).remove();
      $(fieldID).remove();
      $("#instr" + fieldNum + "Label").remove();
    });
  });
}

/**
 * Remove recipe
 */
function removeRecipe() {
  var nextIngridient = 1;
  $("#removeRecipe").click(function(e) {
    e.preventDefault();

    // Get id of recipe
    // Delete request to /veckoplan/id
  });
}
