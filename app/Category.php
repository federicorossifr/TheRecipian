<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    public function recipes() {
        return $this->belongsToMany("App\Recipe","recipeCategories","category","recipe");
    }
}
