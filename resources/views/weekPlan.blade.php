@extends('layouts.app')

@section('title', 'Veckoplan vecka {{$week_plan->week_nr}}, {{week_plan->year}}')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <h2>Veckoplan vecka {{ $week_plan->week_nr }}, {{ $week_plan->year }}</h2>
    <hr />
    @foreach ($week_plan->recipies as $recipe)
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
</div>
@endsection
