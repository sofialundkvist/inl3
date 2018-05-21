@extends('layouts.app')

@section('title', 'Skapa nytt recept')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Skapa nytt recept</h2>

            <form action="/recept" method="post">
                <div class="form-group">
                    <label for="recipeTitle">Titel</label>
                    <input type="text" class="form-control" name="recipeTitle" id="recipeTitle" placeholder="Titel">
                </div>
                <div class="form-group">
                    <label for="recipePortions">Antal portioner</label>
                    <select class="form-control" id="recipePortions" name="recipePortions">
                        <?php for ($i = 1; $i <= 12; $i++) {?>
                            <option value={{$i}}>{{ $i }}</option>
                        <?php }?>
                    </select>
                </div>
                <div class="form-group">
                    <h3>Ingredienser</h3>
                    <fieldset id="recipeIngridients">
                        <div class="row justify-content-start col-md-12" id="ingridientRow1">
                            <input type="text" class="form-control custom-input col-md-12" name="ingridients[]" id="ingridient1" placeholder="Ingrediens">
                        </div>
                        <button type="button" class="btn btn-secondary add-button col-md-4 col-md-offset-4" id="addIngridient">Lägg till ingrediens</button>
                    </fieldset>
                </div>
                <div class="form-group">
                    <h3>Instruktioner</h3>
                    <fieldset id="recipeInstructions">
                        <div class="row justify-content-center" id="instructionsRow1">
                            <input type="text" class="form-control custom-input col-md-12" name="instructions[]" id="instruction1" placeholder="Steg">
                        </div>
                        <button type="button" class="btn btn-secondary add-button" id="addInstruction">Lägg till instruktion</button>
                    </fieldset>
                </div>
                <input type="submit" class="btn btn-success" value="Spara recept">
            </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/recipe.js') }}" defer></script>
@endsection
