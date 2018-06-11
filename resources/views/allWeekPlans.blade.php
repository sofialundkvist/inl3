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
        @auth
            <ul class="nav nav-tabs" id="recipeTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="own-recipes" data-toggle="tab" href="#own" role="tab" aria-controls="own" aria-selected="true">Mina veckoplaner</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="all-recipes" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="false">Alla veckoplaner</a>
                </li>
            </ul>
            <div class="tab-content" id="recipeTabsContent">
                <div class="tab-pane fade show active" id="own" role="tabpanel" aria-labelledby="own-recipes">
                    @foreach ($week_plans as $week_plan)
                        @if ($week_plan->user_id === $current_user_id)
                            <a href="/veckoplan/{{$week_plan->id}}" class="list-item">
                                <li class="list-group-item"><h5>Vecka {{$week_plan->week_nr}}, år {{$week_plan->year}}</h5></li>
                            </a>
                        @endif
                    @endforeach
                </div>
                <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-recipes">
                    @foreach ($week_plans as $week_plan)
                        <a href="/veckoplan/{{$week_plan->id}}" class="list-item">
                            <li class="list-group-item"><h5>Vecka {{$week_plan->week_nr}}, år {{$week_plan->year}}</h5></li>
                        </a>
                    @endforeach
                </div>
            </div>
        @else
            @foreach ($week_plans as $week_plan)
                <a href="/veckoplan/{{$week_plan->id}}" class="list-item">
                    <li class="list-group-item"><h5>Vecka {{$week_plan->week_nr}}, år {{$week_plan->year}}</h5></li>
                </a>
            @endforeach
        @endauth
        </ul>
    </section>

</div>

@endsection
