<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pic;
use Image;
use App\Http\Requests;

class PicController extends Controller
{
    public function get($id,$rid,$pid) {
        $pic = Pic::find($pid);
        $image = Image::make($pic->path);
        return $image->response("png");
    }

}
