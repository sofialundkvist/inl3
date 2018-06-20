<!-- Component -->

<form action={{ $action }} method="POST">
    @if(isset($method))
        <input type="hidden" name="_method" value="PUT"> 
    @endif 
    {{csrf_field()}}
    <div class="form-group col-md-12">
        <label for="recipeTitle">Veckonummer</label>
        <input type="text" class="form-control" name="weekNr" id="weekNr" placeholder="Veckonummer" {{ isset($week_nr) ? "value="
            . $week_nr : ""}}>
    </div>
    <div class="form-group col-md-12">
        <label for="year">År</label>
        <select class="form-control" id="year" name="year">
            <?php for ($i = date("Y"); $i <= (date("Y") + 5); $i++) {?>
                <option value={{ $i }} {{ isset($year) && (int)html_entity_decode($year) === $i ? 'selected="selected"' : "" }}>{{ $i }}</option>
            <?php }?>
        </select>
    </div>
    @unless(isset($week_nr))
    <p class="col-md-12">När du sparat veckoplanen kan du börja lägga till recept i den.</p>
    @endunless
    <div class="col-md-12">
        <input type="submit" class="btn btn-success align-self-center" value="Spara veckoplan">
    </div>
</form>