<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Ingridient;
use App\Instruction;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recipes = Recipe::all();
        return view('recipe.index', [
            'recipes' => $recipes,
            'current_user_id' => Auth::id()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCategories = Category::all();
        return view('recipe.create', [
            'allCategories' => $allCategories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new recipe instance
        $recipe = new Recipe;
        $recipe->title = $request->recipeTitle;
        $recipe->portions_no = $request->recipePortions;
        $recipe->user_id = Auth::id();
        $recipe->save();

        $ingridients = $request->ingridients;
        $instructions = $request->instructions;
        $categories = $request->categories;

        // Add ingridients
        for ($i = 0; $i < count($ingridients); $i++) {
            if (!empty($ingridients[$i])) {
                $newIngridient = new Ingridient;
                $newIngridient->recipe_id = $recipe->id;
                $newIngridient->title = $ingridients[$i];
                // TODO: Lägg till amount och unit
                $newIngridient->save();
            }
        }

        // Add instructions
        for ($i = 0; $i < count($instructions); $i++) {
            if (!empty($instructions[$i])) {
                $newInstruction = new Instruction;
                $newInstruction->recipe_id = $recipe->id;
                $newInstruction->description = $instructions[$i];
                $newInstruction->step_no = $i + 1;
                $newInstruction->save();
            }
        }

        // Add categories
        for ($i = 0; $i < count($categories); $i++) {
            $recipe->categories()->attach($categories[$i]);
        }

        $return_data = json_encode(array('success' => true, 'recipeId' => $recipe->id), JSON_FORCE_OBJECT);
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
        $recipe = Recipe::find($id);
        $recipe->instructions = $recipe->instructions;
        $recipe->ingridients = $recipe->ingridients;
        $recipe->categories = $recipe->categories;
        return view('recipe.show', [
            'recipe' => $recipe,
            'current_user_id' => Auth::id()
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
        $recipe = Recipe::find($id);
        $allCategories = Category::all();
        return view("recipe.edit", [
            'recipe' => $recipe,
            'allCategories' => $allCategories
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
        $recipe = Recipe::find($id);

        // Update title and no of portions
        $recipe->title = $request->recipeTitle;
        $recipe->portions_no = $request->recipePortions;
        $recipe->save();

        // Remove all old ingridients, instructions and categories (to add the new ones instead)
        Ingridient::where('recipe_id', $recipe->id)->delete();
        Instruction::where('recipe_id', $recipe->id)->delete();
        Log::info("instructions and ingridients deleted");
        $recipe->categories()->detach();
        Log::info("categories deleted");

        // Add ingridients
        $ingridients = $request->ingridients;
        for ($i = 0; $i < count($ingridients); $i++) {
            if (!empty($ingridients[$i])) {
                $newIngridient = new Ingridient;
                $newIngridient->recipe_id = $recipe->id;
                $newIngridient->title = $ingridients[$i];
                // TODO: Lägg till amount och unit
                $newIngridient->save();
            }
        }

        // Add instructions
        $instructions = $request->instructions;
        for ($i = 0; $i < count($instructions); $i++) {
            if (!empty($instructions[$i])) {
                $newInstruction = new Instruction;
                $newInstruction->recipe_id = $recipe->id;
                $newInstruction->description = $instructions[$i];
                $newInstruction->step_no = $i + 1;
                $newInstruction->save();
            }
        }

        // Add categories
        $categories = $request->categories;
        for ($i = 0; $i < count($categories); $i++) {
            $recipe->categories()->attach($categories[$i]);
        }

        $return_data = json_encode(array('success' => true, 'recipeId' => $recipe->id), JSON_FORCE_OBJECT);
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
        $recipe = Recipe::find($id);
        $recipe->delete();
        // Remove all ingridients and instructions for the recipe
        Ingridient::where('recipe_id', $id)->delete();
        Instruction::where('recipe_id', $id)->delete();
        $return_data = json_encode(array('success' => true), JSON_FORCE_OBJECT);
        return $return_data;
    }
}
