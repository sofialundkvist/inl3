<?php

namespace App\Http\Controllers;

use App\Recipe;
use App\WeekPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class WeekPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $week_plans = WeekPlan::all();
        $current_user_id = Auth::id();
        return view('weekPlan.index', [
            'week_plans' => $week_plans,
            'current_user_id' => $current_user_id,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('weekPlan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create new week plan instance
        $week_plan = new WeekPlan;
        $week_plan->week_nr = $request->weekNr;
        $week_plan->year = $request->year;
        $week_plan->user_id = Auth::id();
        $week_plan->save();

        Log::info("New week plan created, id: " . $week_plan->id);

        return view("weekPlan.show", [
            'week_plan' => $week_plan,
            'current_user_id' => Auth::id(),
        ]);
    }

    /**
     * Show the view for adding recipes to a weekplan.
     *
     * @return \Illuminate\Http\Response
     */
    public function addRecipes($id)
    {
        $week_plan = WeekPlan::find($id);
        $recipes = $this->filterRecipes($week_plan->recipies);
        return view('weekPlan.addRecipes', [
            'week_plan' => $week_plan,
            'recipes' => $recipes,
        ]);
    }

    /**
     * Filter out recipes that has already been added to weekplan.
     */
    private function filterRecipes($weekPlanRecipes)
    {
        $allRecipes = Recipe::all();
        $recipes = array();
        foreach ($allRecipes as $recipe) {
            $exists = false;
            foreach ($weekPlanRecipes as $weekPlanRecipe) {
                if ($weekPlanRecipe->id == $recipe->id) {
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
     * Attach a recipe to a week plan resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeRecipes(Request $request, $id)
    {
        $week_plan = WeekPlan::find($id);
        $week_plan->recipies()->attach($request->recipeId);
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
        $week_plan = WeekPlan::find($id);
        $week_plan->recipies = $week_plan->recipies;
        $current_user_id = Auth::id();
        return view('weekPlan.show', [
            'week_plan' => $week_plan,
            'current_user_id' => $current_user_id,
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
        $week_plan = WeekPlan::find($id);
        return view('weekPlan.edit', [
            'week_plan' => $week_plan,
        ]
        );
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
        $week_plan = WeekPlan::find($id);
        $week_plan->week_nr = $request->weekNr;
        $week_plan->year = $request->year;
        $week_plan->save();

        return view('weekPlan.show', [
            'week_plan' => $week_plan,
            'current_user_id' => Auth::id(),
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $week_plan = WeekPlan::find($id);
        $week_plan->delete();
        $return_data = json_encode(array('success' => true), JSON_FORCE_OBJECT);
        return $return_data;
    }
}
