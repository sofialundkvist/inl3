@extends('layouts.app')

@section('title', 'Alla recept')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">

    <h2>Alla recept</h2>
        
        @auth 
            <ul class="nav nav-tabs" id="recipeTabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="own-recipes" data-toggle="tab" href="#own" 
                        role="tab" aria-controls="own" aria-selected="true">Mina recept</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="all-recipes" data-toggle="tab" href="#all" 
                        role="tab" aria-controls="all" aria-selected="false">Alla recept</a>
                </li>
            </ul>

            <div class="tab-content" id="recipeTabsContent">
                <div class="tab-pane fade show active" id="own" role="tabpanel" aria-labelledby="own-recipes">
                    <section class="row justify-content-start">
                    @foreach ($recipes as $recipe)
                        @if ($recipe->user_id === $current_user_id)
                            <div class="col-md-3 mb-4">
                                <article class="card card-custom">
                                    <img class="card-img-top" src="{{ asset('images/placeholder_image.png') }}" 
                                        alt="Placeholder image">
                                    <div class="card-body d-flex flex-column justify-content-between">
                                        <h6 class="card-title font-weight-bold">{{ $recipe->title }}</h6>
                                        <div class="d-flex justify-content-between">
                                            <p>
                                                <span class="font-weight-bold">Portioner:</span> 
                                                {{ $recipe->portions_no }}
                                            </p>
                                            <a href="/recept/{{$recipe->id}}" class="btn btn-primary">
                                                Gå till recept
                                            </a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endif
                    @endforeach
                    </section>
                </div>
                <div class="tab-pane fade" id="all" role="tabpanel" aria-labelledby="all-recipes">
                    <section class="row justify-content-start">
                    @foreach ($recipes as $recipe)
                        <div class="col-md-3 mb-4">
                        <article class="card card-custom">
                            <img class="card-img-top" src="{{ asset('images/placeholder_image.png') }}" 
                                alt="Placeholder image">
                            <div class="card-body d-flex flex-column justify-content-between">
                                <h6 class="card-title font-weight-bold">{{ $recipe->title }}</h6>
                                <div class="d-flex justify-content-between">
                                    <p>
                                        <span class="font-weight-bold">Portioner:</span> 
                                        {{ $recipe->portions_no }}
                                    </p>
                                    <a href="/recept/{{$recipe->id}}" class="btn btn-primary">
                                        Gå till recept
                                    </a>
                                </div>
                            </div>
                        </article>
                        </div>
                    @endforeach
                    </section>
                </div>
            </div>

        @else
            <section class="row justify-content-start">
            @foreach ($recipes as $recipe)
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
        @endauth
    </section>

</div>

@endsection
