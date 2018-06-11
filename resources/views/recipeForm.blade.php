<form action={{ $action }} method="POST">
    @if(isset($method))
        <input type="hidden" name="_method" value="PUT"> 
    @endif 
    {{csrf_field()}}
    <div class="form-group col-md-12">
        <label for="recipeTitle">Titel</label>
        <input type="text" class="form-control" name="recipeTitle" id="recipeTitle" 
            placeholder="Titel" {{ isset($title) ? "value=" . $title : "" }}>
    </div>
    <div class="form-group col-md-12">
        <label for="recipePortions">Antal portioner</label>
        <select class="form-control" id="recipePortions" name="recipePortions">
            <?php for ($i = 1; $i <= 12; $i++) {?>
                <option value={{$i}} 
                    {{ isset($portions_no) && (int)html_entity_decode($portions_no) === $i ? 'selected="selected"' : "" }}>
                        {{ $i }}
                </option>
            <?php }?>
        </select>
    </div>
    <div class="form-group">
        <label for="ingridients[]" class="col-md-12">Ingredienser</label>
        <fieldset id="recipeIngridients" class="d-flex flex-row justify-content-center">
            @if (isset($ingridients))
                @foreach($ingridients as $i => $ingridient) 
                    <div class="d-flex flex-row justify-content-start col-md-12" id="ingridientRow{{ $i + 1 }}">
                        <input type="text" class="{{ "form-control custom-input" . 
                            ($i !== 0 ? " col-md-11 " : " col-md-12 ") . "ingridients" }}"
                            name="ingridients[]" id="ingridient{{ $i + 1}}" placeholder="Ingrediens"
                            value={{ $ingridient->title }}
                        >
                        @if($i !== 0)
                            <button id= {{ ($i + 1) . "remove" }} class="btn btn-danger remove-ingridient col-md-1" >
                                -
                            </button>
                        @endif
                    </div>
                @endforeach
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addIngridient">
                    Lägg till ingrediens
                </button>
            @else
                <div class="d-flex flex-row justify-content-start col-md-12" id="ingridientRow1">
                    <input type="text" class="form-control custom-input col-md-12 ingridients" 
                        name="ingridients[]" id="ingridient1" placeholder="Ingrediens"
                    >
                </div>
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addIngridient">
                    Lägg till ingrediens
                </button>
            @endif
        </fieldset>
    </div>
    <div class="form-group">
        <label for="instructions[]" class="col-md-12">Instruktioner</label>
        <fieldset id="recipeInstructions" class="d-flex flex-row justify-content-center">
            @if (isset($instructions))
                @foreach($instructions as $i => $instruction) 
                    <div class="d-flex flex-row justify-content-start col-md-12" id="instructionsRow{{ $i + 1 }}">
                        <input type="text" class="{{ "form-control custom-input" . 
                            ($i !== 0 ? " col-md-11 " : " col-md-12 ") . "instructions" }}"
                            name="instructions[]" id="instruction{{ $i + 1 }}" placeholder="Instruktion"
                            value={{ $instruction->description }}
                        >
                        @if($i !== 0)
                            <button id= {{ ($i + 1) . "removeBtn" }} class="btn btn-danger remove-instruction col-md-1" >
                                -
                            </button>
                        @endif
                    </div>
                @endforeach
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addInstruction">
                    Lägg till instruktion
                </button>
            @else
                <div class="d-flex flex-row justify-content-center col-md-12" id="instructionsRow1">
                    <input type="text" class="form-control custom-input col-md-12 instructions" 
                        name="instructions[]" id="instruction1" placeholder="Steg"
                    >
                </div>
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addInstruction">
                    Lägg till instruktion
                </button>
            @endif

        </fieldset>
    </div>
    <input type="submit" class="btn btn-success align-self-center" value="Spara recept">
</form>