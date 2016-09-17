<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipient extends Model
{
    public function recipes() {
        return $this->belongsToMany("App\Recipes","recipeRecipient","recipient","recipe");
    }
}
