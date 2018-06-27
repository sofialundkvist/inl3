@extends('layouts.app')

@section('title', 'Redigera recept')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="col-md-12">Redigera recept</h2>
            @component('recipe.components.recipeForm', [
                'ingridients' => $recipe->ingridients,
                'instructions' => $recipe->instructions,
                'allCategories' => $allCategories,
                'recipeCategories' => $recipe->categories
            ])
                @slot('action') /recept @endslot
                @slot('method') PUT @endslot
                @slot('title') {{ $recipe->title }} @endslot
                @slot('portions_no') {{ $recipe->portions_no }} @endslot
                @slot('recipe_id') {{ $recipe->id }} @endslot
            @endComponent
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/recipe.js') }}" defer></script>
@endsection
