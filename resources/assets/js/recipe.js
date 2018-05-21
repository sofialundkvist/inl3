$(document).ready(function () {
    var nextIngridient = 1;
    $("#addIngridient").click(function (e) {
        e.preventDefault();

        // Get id of last input field:
        var lastInput = nextIngridient;

        // Set number for next input field
        nextIngridient = nextIngridient + 1;

        // Create new input element and remove button
        var newIn = '<div class="row justify-content-left" id="ingridientRow' + nextIngridient + '"> \
            <input class="form-control col-md-11" id="ingridient' + nextIngridient + '" \
            name="ingridients[]" type="text" placeholder="Ingrediens">\
            </div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextIngridient - 1) + '" \
            class="btn btn-danger remove-ingridient col-md-1" >-</button>';
        var removeButton = $(removeBtn);

        // Add new input and remove button after last input field
        $("#ingridientRow" + lastInput).after(newInput);
        $("#ingridient" + nextIngridient).after(removeButton);

        // Add click event to the remove button on new input field
        $('.remove-ingridient').click(function (e) {
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length - 1); // get id of input
            var fieldID = "#ingridient" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });
    });

    var nextInstruction = 1;
    $("#addInstruction").click(function (e) {
        e.preventDefault();

        // Get id of last input field:
        var lastInput = nextInstruction;

        // Set number for next input field
        nextInstruction = nextInstruction + 1;

        // Create new input element and remove button
        var newIn = '<div class="row justify-content-center" id="instructionsRow' + nextInstruction + '"> \
            <input class="form-control col-md-10" id="instruction' + nextInstruction + '" \
            name="instructions[]" type="text" placeholder="Steg"></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="removeBtn' + (nextInstruction - 1) + '" \
            class="btn btn-danger remove-instruction col-md-1" >-</button>';
        var removeButton = $(removeBtn);

        // Add new input and remove button after last input field
        $("#instructionsRow" + lastInput).after(newInput);
        $("#instruction" + lastInput).after(removeButton);

        // Add click event to remove button on new input field
        $('.remove-instruction').click(function (e) {
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length - 1); // get id of input
            var fieldID = "#instruction" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
            $("#instr" + fieldNum + "Label").remove();
        });
    });
});