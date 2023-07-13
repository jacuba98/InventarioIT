<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\Historial as ModelsHistorial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('component.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('component.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $component = Component::create([
            'no_equipo' => $request->no_equipo,
            'equipo' => $request->equipo,
        ]);

        ModelsHistorial::create([
            'type' => 'Alta',
            'inventory_id' => $component->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('component.index')->with('success', 'El elemento de componente ha sido creado.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
