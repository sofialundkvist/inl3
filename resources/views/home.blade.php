@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-stretch">
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
                    Här kan du spara recept och kategorisera dem samt skapa veckoplaner med recept att laga.
                </div>
            </div>
        </div>
         <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2>Recept</h2>
                </div>
                <div class="card-body">
                    Du kan lägga till recept med ingridienser och instruktioner. Du kan även se andra användares recept.
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2>Veckoplaner</h2>
                </div>
                <div class="card-body">
                    Du kan skapa veckoplaner och lägga till recept som du vill laga i dem.
                </div>
            </div>
        </div>
         <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-header">
                    <h2>Kategorier</h2>
                </div>
                <div class="card-body">
                    Du kan skapa kategorier och lägga till recept i dessa.
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
