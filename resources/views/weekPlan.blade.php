@extends('layouts.app')

@section('title', 'Veckoplan vecka {{$week_plan->week_nr}}, {{week_plan->year}}')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
    <link href="{{ asset('css/weekPlan.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="d-flex justify-content-between">
        <h2>Veckoplan vecka {{ $week_plan->week_nr }}, {{ $week_plan->year }}</h2>
        @if ($week_plan->user_id === $current_user_id)
        <div>
            <a href="/veckoplan/{{$week_plan->id}}/recept" class="btn btn-primary">Lägg till recept</a>
            <a href="/veckoplan/{{$week_plan->id}}/redigera" class="btn btn-primary">Redigera</a>
            <button href="/veckoplan/{{$week_plan->id}}/redigera" class="btn btn-primary" id="removeRecipe">Ta bort</button>
        </div>
        @endif
    </div>
    <hr />
    <section class="d-flex flex-row flex-wrap justify-content-start">
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
    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/weekPlan.js') }}" defer></script>
@endsection
