<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Response;
class Pic extends Model
{
    public $timestamps = false;
    public $defaultPath  = "/resources/uploads";
    

}
