<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * Get the instructions for the recipe.
     */
    public function instructions()
    {
        return $this->hasMany('App\Instruction');
    }

    /**
     * Get the ingridients for the recipe.
     */
    public function ingridients()
    {
        return $this->hasMany('App\Ingridient');
    }

    /**
     * Get the categories that this recipe is in.
     */
    public function categories()
    {
        return $this->belongsToMany('App\Category');
    }

    /**
     * Get the weekplans that this recipe is in.
     */
    public function week_plans()
    {
        return $this->belongsToMany('App\WeekPlan');
    }
}
