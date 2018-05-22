@extends('layouts.app')

@section('title', 'Alla veckoplaner')

@section('styles')
    <link href="{{ asset('css/weekPlan.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <h2 class="mb-3">Alla veckoplaner</h2>

    <section class="row justify-content-center">
        <ul class="col-md-12 list-group week-plan-list"> 
        @foreach ($week_plans as $week_plan)
            <a href="/veckoplan/{{$week_plan->id}}" class="list-item">
                <li class="list-group-item"><h5>Vecka {{$week_plan->week_nr}}, år {{$week_plan->year}}</h5></li>
            </a>
        @endforeach
        </ul>
    </section>

</div>

@endsection
