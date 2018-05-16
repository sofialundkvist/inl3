@extends('layouts.app')

@section('title', 'Veckoplan')

@section('content')

<h2>Veckoplan vecka {{ $week_plan->week_nr }}, {{ $week_plan->year }}</h2>
<hr />

@foreach ($week_plan->recipies as $recipe)
    <h3>Titel: {{ $recipe->title }}</h3>
    <h3>Antal portioner: {{ $recipe->portions_no }}</h3>
    <hr />
@endforeach

@endsection
