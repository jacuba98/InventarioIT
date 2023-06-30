<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return view('inventory.index', compact('inventory'));
    }

    public function create()
    {
        return view('inventory.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'equipo' => 'required',
        ]);

        Inventory::create([
            'name' => $request->name,
            'equipo' => $request->equipo,
        ]);

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido creado.');
    }

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.show', compact('inventory'));
    }

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'equipo' => 'required',
        ]);

        $inventory = Inventory::findOrFail($id);
        $inventory->name = $request->name;
        $inventory->equipo = $request->equipo;
        $inventory->save();

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido actualizado.');
    }

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido eliminado.');
    }
}
