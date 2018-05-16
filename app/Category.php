<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Get the recipes in the category.
     */
    public function recipies()
    {
        return $this->belongsToMany('App\Recipe');
    }
}
