@extends('layouts.app')

@section('title', 'Kategori')

@section('content')
<div class="container">
    <h2>Kategori: {{ $category->title }}</h2>
    <hr />

    @foreach ($category->recipies as $recipe)
        <h3>Titel: {{ $recipe->title }}</h3>
        <h3>Antal portioner: {{ $recipe->portions_no }}</h3>
        <hr />
    @endforeach
</div>
@endsection
