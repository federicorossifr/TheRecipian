<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    
    public $timestamps = false;
    public function author() {
        return $this->belongsTo("App\User","user");
    }
    
    public function comments() {
        return $this->hasMany("App\RecipeComment","recipe");
    }
    
    public function votes() {
        return $this->hasMany("App\RecipeVote","recipe");
    }
    
    public function recipients() {
        return $this->belongsToMany("App\Recipient","recipeRecipients","recipe","recipient")->withPivot("dosing","unit");
    }
    
    public function pictures() {
        return $this->belongsToMany("App\Pic","recipePic","recipe","pic");
    }
    
    public function categories() {
        return $this->belongsToMany("App\Category","recipeCategories","recipe","category");
    }
}
