@extends('layouts.app')

@section('title', 'Kategorier')

@section('styles')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <section class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="mb-3">Skapa ny kategori</h2>
            @component('category.components.categoryForm')
                @slot('action') /kategori @endslot
            @endcomponent
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
