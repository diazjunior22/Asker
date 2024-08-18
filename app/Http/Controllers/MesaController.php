<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MesaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MesaController extends Controller
{

    public function create(): View
    {
        $mesa = new Mesa();

        return view('mesa.create', compact('mesa'));
    }

    /**
     * Store a newly created resource in storage.
*/}