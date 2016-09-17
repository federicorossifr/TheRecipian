<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public function recipes() {
        return $this->hasMany("App\Recipe","user");
    }
    
    public function comments() {
        return $this->hasMany("App\RecipeComment","user");
    }
    
    public function votes() {
        return $this->hasMany("App\RecipeVote","user");
    }
    
    public function followers() {
        return $this->belongsToMany("App\User","userFollow","followed","follower");
    }
    
    public function following() {
        return $this->belongsToMany("App\User","userFollow","follower","followed");
    }
    
    public function picture() {
        return $this->belongsTo("App\Pic","pic");
    }
}
