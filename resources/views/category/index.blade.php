@extends('layouts.app')

@section('title', 'Kategorier')

@section('content')
<div class="container">
    <h2>Kategorier</h2>
    <section>
        <ul class="list-group">
        @foreach ($categories as $category)
            <li class="list-group-item d-flex flex-row justify-content-between align-items-center">
                <span>{{ $category->title }}</span>
                <div>
                    <a href="/kategori/{{ $category->id }}/redigera" class="btn btn-primary" role="button">Redigera</a>
                    <button class="btn btn-danger deleteCategory" data-category-id={{ $category->id }}>Ta bort</button>
                </div>
            </li>
        @endforeach
        </ul>
    </section>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/category.js') }}" defer></script>
@endsection
