@extends('layouts.app')

@section('title', 'Alla recept')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/weekPlan.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <a href="/kategori/{{$category->id}}"><< Tillbaka till kategoriöversikt</a>
    <h2 class="mt-4 mb-3">Lägg till recept</h2>
    @if(count($recipes) > 0)
        <section class="row justify-content-start">
            @foreach ($recipes as $recipe)
            <div class="col-md-3 mb-4">
                <article class="card card-custom">
                    <img class="card-img-top" src="{{ asset('images/placeholder_image.png') }}" alt="Placeholder image">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h6 class="card-title font-weight-bold">{{ $recipe->title }}</h6>
                        <div class="d-flex justify-content-between">
                            <p><span class="font-weight-bold">Portioner:</span> {{ $recipe->portions_no }}</p>
                            <button type="button" class="btn btn-primary addRecipeBtn" id="{{$recipe->id}}addRecipeBtn">Lägg till recept</a>
                        </div>
                    </div>
                </article>
            </div>
            @endforeach
        </section>
    @else
        <p>Det finns inga fler recept att lägga till.</p>
    @endif
    <div id="category_id" style="display: none;">
        <?php 
            echo $category->id;
        ?>
    </div>
</div>

@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
