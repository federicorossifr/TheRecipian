<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Response;
use Cookie;
use App\User;

class UserController extends Controller
{
    public function create(Request $request) {
        $user = new User;
        $user->username = $request->username;
        $user->passkey = password_hash($request->passkey,PASSWORD_BCRYPT);
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->save();
        echo $user;
    }
    
    public function read(Request $request,$id) {
        $user = User::find($id);
        return view("userView",["user"=>$user]);
    }
    
    public function update(Request $request,$id) {
        $user = User::find($id);
        $user->username = $request->username;
        $user->passkey = password_hash($request->passkey,PASSWORD_BCRYPT);
        $user->email = $request->email;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->pic = $request->pic;
        $user->save();
        echo $user;
    }
    
    public function delete(Request $request,$id) {
        $user = User::find($id);
        $user->delete();
    }
    
    public function auth(Request $request) {
        $username = $request->username;
        $password = $request->passkey;
        $user = User::where("username",$username)->first();
        $storedPasskey = $user->passkey;
        $result =  password_verify($password,$storedPasskey);
        
        $response = Response::make("" . $result);
        $response->header("Content-Type","application/json");
        if($result) {
            $response->withCookie(Cookie::make("logged","1","1440"));
            $response->withCookie(Cookie::make("id",$user->id,"1440"));
        }
        return $response;
    }
    
    public function logout(Request $request) {
        return redirect("/")->withCookies([Cookie::forget("logged"),Cookie::forget("id")]);
    }
}
