<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeVote extends Model
{
    public function author() {
        return $this->belongsTo("App\User","user");
    }
}
