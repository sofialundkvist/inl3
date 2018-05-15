@extends('layouts.app')

@section('title', 'Alla recept')

@section('content')

<h2>Alla recept</h2>

@foreach ($recipes as $recipe)
    {{ $recipe->title }}
@endforeach

@endsection
