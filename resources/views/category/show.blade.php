@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container">
    <div class="d-flex flex-row justify-content-between align-items-center mb-3">
    <h2>Kategori: {{ $category->title }}</h2>
        @auth
            <div class="d-flex flex-row">
                <a href="/kategori/{{$category->id}}/recept" class="btn btn-primary mr-2" role="button">
                    Lägg till recept
                </a>
                <a href="/kategori/{{ $category->id }}/redigera" class="btn btn-primary mr-2" role="button">
                    Redigera
                </a>
                <button class="btn btn-danger deleteCategory" data-category-id={{ $category->id }}>Ta bort</button>
            </div>
        @endauth
    </div>
    @if(count($category->recipies) > 0)
        <section class="d-flex flex-row flex-wrap justify-content-start">
        @foreach ($category->recipies as $recipe)
            <div class="col-md-3 mb-4">
            <article class="card card-custom">
                <img class="card-img-top" src="{{ asset('images/placeholder_image.png') }}" alt="Placeholder image">
                <div class="card-body d-flex flex-column justify-content-between">
                    <h6 class="card-title font-weight-bold">{{ $recipe->title }}</h6>
                    <div class="d-flex justify-content-between">
                        <p><span class="font-weight-bold">Portioner:</span> {{ $recipe->portions_no }}</p>
                        <a href="/recept/{{$recipe->id}}" class="btn btn-primary">Gå till recept</a>
                    </div>
                </div>
            </article>
        </div>
        @endforeach
        </section>
    @else
        <p>Det finns inga recept i denna kategorin ännu.</p>
    @endif
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
