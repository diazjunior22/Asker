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
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $mesas = Mesa::all();

    //     return view('user.user', compact('mesas'));
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $mesa = new Mesa();

        return view('mesa.create', compact('mesa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MesaRequest $request): RedirectResponse
    {
        Mesa::create($request->validated());

        return Redirect::route('mesas.index')
            ->with('success', 'Mesa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $mesa = Mesa::find($id);

        return view('mesa.show', compact('mesa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $mesa = Mesa::find($id);

        return view('mesa.edit', compact('mesa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MesaRequest $request, Mesa $mesa): RedirectResponse
    {
        $mesa->update($request->validated());

        return Redirect::route('mesas.index')
            ->with('success', 'Mesa updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Mesa::find($id)->delete();

        return Redirect::route('mesas.index')
            ->with('success', 'Mesa deleted successfully');
    }
}
