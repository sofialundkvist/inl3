@extends('layouts.app') 
@section('title', 'Redigera veckoplan') 
@section('styles')
<link href="{{ asset('css/weekPlan.css') }}" rel="stylesheet">
@endsection
 
@section('content')
<section class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="col-md-12">Redigera veckoplan</h2>
            @component('weekPlan.components.weekPlanForm') 
                @slot('week_nr') {{ $week_plan->week_nr }} @endslot
                @slot('year') {{ $week_plan->year }} @endslot 
                @slot('action') /veckoplan/{{ $week_plan->id }} @endslot 
                @slot('method') PUT @endslot 
            @endcomponent
        </div>
    </div>
</section>
@endsection