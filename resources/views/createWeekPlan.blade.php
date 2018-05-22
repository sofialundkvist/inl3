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

            <form action="/veckoplan" method="POST">
                {{csrf_field()}}
                <div class="form-group col-md-12">
                    <label for="recipeTitle">Veckonummer</label>
                    <input type="text" class="form-control" name="weekNr" id="weekNr" placeholder="Veckonummer">
                </div>
                <div class="form-group col-md-12">
                    <label for="year">Antal portioner</label>
                    <select class="form-control" id="year" name="year">
                        <?php for ($i = date("Y"); $i <= (date("Y") + 5); $i++) {?>
                            <option value={{$i}}>{{ $i }}</option>
                        <?php }?>
                    </select>
                </div>
                <p class="col-md-12">När du sparat veckoplanen kan du börja lägga till recept i den.</p>
                <div class="col-md-12">
                  <input type="submit" class="btn btn-success align-self-center" value="Spara veckoplan">
                </div>
            </form>
        </div>
    </div>
</section>
@endsection
