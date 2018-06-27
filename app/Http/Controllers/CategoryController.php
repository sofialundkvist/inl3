<?php

namespace App\Http\Controllers;

use App\Category;
use App\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Category;
        $category->title = $request->title;
        $category->save();

        $return_data = json_encode(array('success' => true, 'categoryId' => $category->id), JSON_FORCE_OBJECT);
        return $return_data;
    }

    /**
     * Show the view for adding recipes to a category.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRecipes($id)
    {
        $category = Category::find($id);
        $recipes = $this->filterRecipes($category->recipies);
        return view('category.addRecipes', [
            'category' => $category,
            'recipes' => $recipes,
        ]);
    }

    /**
     * Filter out recipes that has already been added to category.
     */
    private function filterRecipes($categoryRecipies)
    {
        $allRecipes = Recipe::all();
        $recipes = array();
        foreach ($allRecipes as $recipe) {
            $exists = false;
            foreach ($categoryRecipies as $categoryRecipe) {
                if ($categoryRecipe->id == $recipe->id) {
                    $exists = true;
                    break;
                }
            }
            if (!$exists) {
                array_push($recipes, $recipe);
            }
        };
        return $recipes;
    }

    /**
     * Attach a recipe to a category resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeRecipes(Request $request, $id)
    {
        $category = Category::find($id);
        $category->recipies()->attach($request->recipeId);
        $return_data = json_encode(array('success' => true), JSON_FORCE_OBJECT);
        return $return_data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::find($id);
        $category->recipies = $category->recipies;
        return view('category.show', [
            'category' => $category,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', [
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->title = $request->title;
        $category->save();

        $return_data = json_encode(array('success' => true, 'categoryId' => $category->id), JSON_FORCE_OBJECT);
        return $return_data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        $return_data = json_encode(array('success' => true), JSON_FORCE_OBJECT);
        return $return_data;
    }
}
