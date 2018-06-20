@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container">
    <h2 class="mb-3">Kategori: {{ $category->title }}</h2>
    @if(count($category->recipies) > 0)
        @foreach ($category->recipies as $recipe)
            <h3>Titel: {{ $recipe->title }}</h3>
            <h3>Antal portioner: {{ $recipe->portions_no }}</h3>
            <hr />
        @endforeach
    @else
        <p>Det finns inga recept i denna kategorin ännu.</p>
    @endif
</div>
@endsection
