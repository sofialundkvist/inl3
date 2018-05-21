<?php

namespace App\Http\Controllers;

use App\Recipe;
use Illuminate\Http\Request;

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
        $recipe->portions = $request->recipePortions;
        $recipe->save();

        Log::info('Saving recipe');

        $ingridients = $request->ingridients;
        $instructions = $request->instructions;

        // Add ingridients
        for ($i = 0; $i > count($ingridients); $i++) {
            if (!empty($ingridients[$i + 1])) {
                $newIngridient = new Ingridient;
                $newIngridient->recipe_id = $recipe->id;
                $newIngridient->title = $ingridient;
                // TODO: Lägg till amount och unit
                $newIngridient->save();
            }
        }

        // Add instructions
        for ($i = 0; $i > count($instructions); $i++) {
            if (!empty($instructions[$i + 1])) {
                $newInstruction = new Instruction;
                $newInstruction->recipe_id = $recipe->id;
                $newInstruction->description = $instructions[$i + 1];
                $newInstruction->step_no = $i + 1;
                $newInstruction->save();
            }
        }

        return redirect('/recept'+'/'+$recipe->id);
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
        $recipe->instructions = json_encode($recipe->instructions);
        $recipe->ingridients = json_encode($recipe->ingridients);
        $recipe->cateogories = json_encode($recipe->categories);
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
