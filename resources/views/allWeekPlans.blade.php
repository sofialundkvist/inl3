@extends('layouts.app')

@section('title', 'Alla veckoplaner')

@section('content')

<h2>Alla veckoplaner</h2>
<hr />

@foreach ($week_plans as $week_plan)
    <h3>År: {{ $week_plan->year }}</h3>
    <h3>Veckonummer: {{ $week_plan->week_nr }}</h3>
    <h3>Recept:</h3>
    {{ $week_plan->recipies }}
    <hr />
@endforeach

@endsection
