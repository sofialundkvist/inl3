<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WeekPlan extends Model
{
    /**
     * Get the recipes in the week plan.
     */
    public function recipies()
    {
        return $this->belongsToMany('App\Recipe');
    }
}
