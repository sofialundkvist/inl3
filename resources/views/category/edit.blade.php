@extends('layouts.app')

@section('title', 'Kategorier')

@section('styles')
    <link href="{{ asset('css/category.css') }}" rel="stylesheet" />
@endsection

@section('content')
<div class="container">
    <section class="row justify-content-center">
        <div class="col-md-8 justify-content-center">
            <h2 class="mb-3">Redigera kategori</h2>
            @component('category.components.categoryForm')
                @slot('action') /kategori @endslot
                @slot('method') PUT @endslot
                @slot('category_id') {{ $category->id }} @endslot
                @slot('title') {{ $category->title }} @endslot
            @endcomponent
        </div>
    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
