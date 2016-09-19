<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeComment extends Model
{
    public $timestamps = false;
    public function author() {
        return $this->belongsTo("App\User","user");
    }
}
