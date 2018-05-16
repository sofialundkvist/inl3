$(document).ready(function () {
    var nextIngridient = 1;
    $("#addIngridient").click(function (e) {
        e.preventDefault();

        // Get id of last input field:
        var lastInput = nextIngridient;

        // Set number for next input field
        nextIngridient = nextIngridient + 1;

        // Create new input element and remove button
        var newIn = '<div class="row" id="ingridientRow' + nextIngridient + '"><input class="form-control col-md-11" id="ingridient' + nextIngridient + '" name="ingridient' + nextIngridient + '" type="text" placeholder="Ingrediens"></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (nextIngridient - 1) + '" class="btn btn-danger remove-me col-md-1" >-</button></div><div id="field">';
        var removeButton = $(removeBtn);

        // Add new input and remove button after last input field
        $("#ingridientRow" + lastInput).after(newInput);
        $("#ingridient" + lastInput).after(removeButton);

        // Add click event to remove button on new input field
        $('.remove-me').click(function (e) {
            e.preventDefault();
            var fieldNum = this.id.charAt(this.id.length - 1); // get id of input
            var fieldID = "#ingridient" + fieldNum;
            $(this).remove();
            $(fieldID).remove();
        });
    });
});