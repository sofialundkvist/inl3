<form 
    class="d-flex flex-column justify-content-center align-items-center" 
    id="categoryForm"
    action={{ $action }} method="POST" id="recipeForm" 
    {{ isset($category_id) ? "data-category-id=" . $category_id : "" }}
>
    @if(isset($method))
        <input type="hidden" name="_method" value="PUT"> 
    @endif
    {{csrf_field()}}
    <input type="text" name="title" id="categoryTitle" 
        placeholder="Namn på kategori" class="form-control"
        value="{{ isset($title) ? $title : "" }}"
    >
    <input type="submit" value="Spara" class="btn btn-success mt-3 submit-button">
</form>