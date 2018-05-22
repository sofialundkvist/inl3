@extends('layouts.app')

@section('title', '{{$recipe->title}}')

@section('styles')
    <link href="{{ asset('css/recipe.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container recipe">
  <div class="row mb-5">
    <img class="col-sm-12 col-md-6" src="{{ asset('images/placeholder_image.png') }}" alt="Placeholder image">
    <div class="col-sm-12 col-md-6">
      <h2>{{$recipe->title}}</h2>
      <p><span>Antal portioner: </span>{{$recipe->portions_no}}</p>
      <p>
        <span>Kategorier: </span>
          @foreach($recipe->categories as $i => $category) 
            {{$category->title}}
            <?php if (!((count($recipe->categories) - 1) == $i)): ?>
            , 
            <?php endif; ?>
          @endforeach
      </p>
    </div>
  </div>
  <div class="row justify-content-start details">
    <section class="col-sm-12 col-md-4 ingridients">
        <h4 class="mb-3">Ingredienser</h4>
        <ul class="list-group">
        @foreach ($recipe->ingridients as $ingridient)
          <li class="list-group-item">{{$ingridient->title}}</li>
        @endforeach
        </ul>
      </section>
    <section class="col-sm-12 col-md-8 instructions">
        <h4 class="mb-3">Instruktioner</h4>
        <ul class="list-group">
        @foreach ($recipe->instructions as $instruction)
          <li class="list-group-item d-flex">
            <span class="font-weight-bold mr-3">{{$instruction->step_no}} </span>
            <p>{{$instruction->description}}</p>
          </li>
        @endforeach
        </ul>
    </section>
  </div>
</div>

@endsection

