<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Recipe;
use App\User;
use App\Pic;
use App\Category;
use Image;
class RecipeController extends Controller
{
    public function create(Request $request,$id) { 
        $recipeInput = Input::all();
        $recipe = new Recipe;
        $recipe->name = $recipeInput["name"];
        $recipe->description = $recipeInput["description"];
        $recipe->difficulty = $recipeInput["difficulty"];
        $recipe->user = $id;
        $recipe->save();
        
        if(Input::has("files")) {
            foreach($recipeInput["files"] as $file) {
                $pic = new Pic;
                $upFolder = base_path() . $pic->defaultPath;
                $encName = md5($file->getClientOriginalName() . microtime());
                $finalPath = $upFolder . "/" . $encName;
                Image::make($file->path())->save($finalPath);
                $pic->path = $finalPath;
                $pic->save();
                $recipe->pictures()->attach($pic->id);
            }
        }
        
        if(Input::has("categories")) {
            foreach($recipeInput["categories"] as $categoryName) {
                $category = Category::firstOrCreate(['name'=>$categoryName]);
                $recipe->categories()->attach($category->id);
            }
        }
        return redirect("/users/$id");
    }
    
    public function read($id,$rid) {
        $user = User::find($id);
        $recipe = Recipe::find($rid);
        return view("recipeView",["recipe"=>$recipe,"user"=>$user]);
    }
    
    public function update(Request $request,$id) {
        
    }
    
    
    public function delete(Request $request,$id) {
        
    }
}
