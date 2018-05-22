<?php

namespace App\Http\Controllers;

use App\WeekPlan;
use Illuminate\Http\Request;
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
        return view('allWeekPlans', [
            'week_plans' => $week_plans,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('createWeekplan');
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
         $week_plan->save();

         Log::info("New week plan created, id: " . $week_plan->id);

         return("Veckoplan skapad");
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
        return view('weekPlan', [
            'week_plan' => $week_plan,
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
        //
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
