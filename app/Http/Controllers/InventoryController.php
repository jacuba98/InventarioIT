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
    }//Muestra una lista de todos los elementos de inventario.

    public function create()
    {
        return view('inventory.create');
    }//Muestra un formulario para agregar un nuevo elemento de inventario.

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
    }//Almacena el nuevo elemento de inventario en la base de datos y redirige a la lista de inventario.

    public function show($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.show', compact('inventory'));
    }//Muestra los detalles de un elemento de inventario específico.

    public function edit($id)
    {
        $inventory = Inventory::findOrFail($id);
        return view('inventory.edit', compact('inventory'));
    }//Muestra un formulario para editar un elemento de inventario específico.

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
    }//Actualiza un elemento de inventario específico en la base de datos y redirige a la lista de inventario.

    public function destroy($id)
    {
        $inventory = Inventory::findOrFail($id);
        $inventory->delete();

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido eliminado.');
    }//Elimina un elemento de inventario específico de la base de datos y redirige a la lista de inventario.
}
