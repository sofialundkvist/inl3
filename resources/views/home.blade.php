@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2>Välkommen till matplaneraren</h2>
                    </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    Här kan du skapa veckoplaner med recept som du vill laga.
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
