<form action={{ $action }} method="POST" id="recipeForm" 
    {{ isset($recipe_id) ? "data-recipe-id=" . $recipe_id : "" }}
    class="d-flex flex-column align-items-center"
>
    @if(isset($method))
        <input type="hidden" name="_method" value="PUT"> 
    @endif 
    {{csrf_field()}}
    <div class="form-group col-md-12">
        <label for="recipeTitle">Titel</label>
        <input type="text" class="form-control" name="recipeTitle" id="recipeTitle" 
            placeholder="Titel" value="{{ isset($title) ? $title : "" }}">
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

    <div class="form-group col-md-12">
        <label for="ingridients[]">Ingredienser</label>
        <fieldset id="recipeIngridients" class="d-flex flex-column justify-content-center">
            @if (isset($ingridients) && count($ingridients) > 0)
                @foreach($ingridients as $i => $ingridient) 
                    <div class="d-flex flex-row justify-content-start" id="ingridientRow{{ $i + 1 }}">
                        <input type="text" class="{{ "form-control custom-input" . 
                            ($i !== 0 ? " col-md-11 " : " col-md-12 ") . "ingridients" }}"
                            name="ingridients[]" id="ingridient{{ $i + 1}}" placeholder="Ingrediens"
                            value="{{ $ingridient->title }}"
                        >
                        @if($i !== 0)
                            <button 
                                id= {{ ($i + 1) . "remove" }} 
                                class="btn btn-danger remove-ingridient col-md-1"
                            >
                                -
                            </button>
                        @endif
                    </div>
                @endforeach
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addIngridient">
                    Lägg till ingrediens
                </button>
            @else
                <div class="d-flex flex-row justify-content-start" id="ingridientRow1">
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

    <div class="form-group col-md-12">
        <label for="instructions[]">Instruktioner</label>
        <fieldset id="recipeInstructions" class="d-flex flex-column justify-content-center">
            @if (isset($instructions) && count($instructions) > 0)
                @foreach($instructions as $i => $instruction) 
                    <div class="d-flex flex-row justify-content-start" id="instructionsRow{{ $i + 1 }}">
                        <input type="text" class="{{ "form-control custom-input" . 
                            ($i !== 0 ? " col-md-11 " : " col-md-12 ") . "instructions" }}"
                            name="instructions[]" id="instruction{{ $i + 1 }}" placeholder="Instruktion"
                            value="{{ $instruction->description }}"
                        >
                        @if($i !== 0)
                            <button 
                                id= {{ ($i + 1) . "removeBtn" }} 
                                class="btn btn-danger remove-instruction col-md-1" 
                            >
                                -
                            </button>
                        @endif
                    </div>
                @endforeach
                <button type="button" class="btn btn-secondary add-button col-md-3" id="addInstruction">
                    Lägg till instruktion
                </button>
            @else
                <div class="d-flex flex-row justify-content-center" id="instructionsRow1">
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

    <div class="form-group col-md-12">
        <label for="category">Kategorier</label>
        <fieldset id="recipeCategories" class="d-flex flex-column justify-content-center">
            @if (isset($recipeCategories) && count($recipeCategories) > 0)
                @foreach($allCategories as $i => $category)
                    @foreach($recipeCategories as $recipeCategory)
                        <?php 
                            $checked = false;
                            if ($category->id == $recipeCategory->id) {
                                $checked = true; 
                                break;
                            }
                        ?>
                    @endforeach
                    <div class="d-flex flex-row justify-content-start align-items-baseline">
                        <input type="checkbox" id={{ "category" . $category->id }} name="category"
                            value={{ $category->title }} data-category-id={{ $category->id }} {{ $checked ? "checked" : "" }} />
                        <label for={{ "category" . $category->id }} class="ml-2">{{ $category->title }}</label>
                    </div>
                @endforeach
            @else
                @foreach($allCategories as $category) 
                    <div class="d-flex flex-row justify-content-start align-items-baseline">
                        <input type="checkbox" id={{ "category" . $category->id }} name="category"
                            value={{ $category->title }} data-category-id={{ $category->id }} />
                        <label for={{ "category" . $category->id }} class="ml-2">{{ $category->title }}</label>
                    </div>
                @endforeach
            @endif
        </fieldset>
    </div>


    <input type="submit" class="btn btn-success align-self-center" value="Spara recept">
</form>