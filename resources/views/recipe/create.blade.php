@extends('layouts.app')

@section('title', 'Skapa nytt recept')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="col-md-12">Skapa nytt recept</h2>
            @component('recipe.components.recipeForm', [
                'allCategories' => $allCategories
            ])
                @slot('action') /recept @endslot
                @slot('categories')  @endslot
            @endComponent
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script src="{{ asset('js/recipe.js') }}" defer></script>
@endsection
