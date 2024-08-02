<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mesa;

class MeseroController extends Controller
{
    public function inicio(){
        $mesas = Mesa::all();
        return view("user.user", compact('mesas'));
    }

    public function productos($id)
{
    $mesa = Mesa::findOrFail($id);
    return view('user.mesas', compact('mesa'));
}





}



