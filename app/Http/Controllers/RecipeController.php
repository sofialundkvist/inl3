<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\Ingridient;
use App\Instruction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Log::info('Show all recipes');
        $recipes = Recipe::all();
        return view('allRecipes', [
            'recipes' => $recipes,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createRecipe');
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
        $recipe->save();

        Log::info('Recipe instance created, id = ' . $recipe->id);

        $ingridients = $request->ingridients;
        $instructions = $request->instructions;

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

        return redirect('/recept' . '/' . (string) $recipe->id);
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
        return view('recipe', [
            'recipe' => $recipe,
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
        return "Här ska visas formulär för att redigera ett recept";
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
