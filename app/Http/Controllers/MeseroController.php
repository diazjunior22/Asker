<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeseroController extends Controller
{
    public function comidas(){
        return route("comidas");
    }
}
