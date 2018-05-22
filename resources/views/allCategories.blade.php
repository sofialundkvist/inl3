@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')

<h2>Kategorier</h2>

@foreach ($categories as $category)
    {{ $category->title }}
@endforeach

@endsection
