<?php

namespace App\Http\Controllers;
use App\Traits\HttpResponseTrait ;
use Illuminate\Database\Eloquent\SoftDeletes;
abstract class Controller
{
    use HttpResponseTrait ,SoftDeletes;
}
