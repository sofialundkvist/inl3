@extends('layouts.app') 
@section('title', 'Skapa ny veckoplan') 
@section('styles')
    <link href="{{ asset('css/weekPlan.css') }}" rel="stylesheet">
@endsection
 
@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="col-md-12">Skapa ny veckoplan</h2>
            @component('weekPlan.components.weekPlanForm') @slot('action') /veckoplan @endslot @endcomponent
        </div>
    </div>
</section>
@endsection