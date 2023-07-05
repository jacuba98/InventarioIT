<?php

namespace App\Http\Controllers;

use App\Models\Inventory;
use Illuminate\Http\Request;
Use App\Http\Controllers\Historial;
use App\Models\Historial as ModelsHistorial;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $inventory = Inventory::create([
            'name' => $request->name,
            'equipo' => $request->equipo,
        ]);

        ModelsHistorial::create([
            'type' => 'Alta',
            'inventory_id' => $inventory->id,
            'user_id' => Auth::user()->id
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

        ModelsHistorial::create([
            'type' => 'Alta',
            'inventory_id' => $inventory->id,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido actualizado.');
    }//Actualiza un elemento de inventario específico en la base de datos y redirige a la lista de inventario.

    public function destroy($id)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        $inventory = Inventory::findOrFail($id);

        //$inventory->historials()->detach();
        if ($inventory->exists()) {
            // Actualizar el campo 'inventory_id' en los registros relacionados en la tabla historials
            $inventory->historials()->update(['inventory_id' => $inventory->id]);
        }

        ModelsHistorial::create([
            'type' => 'Baja',
            'inventory_id' => $inventory->id,
            'user_id' => Auth::user()->id
        ]);

        $inventory->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        return redirect()->route('inventory.index')->with('success', 'El elemento de inventario ha sido eliminado.');
    }//Elimina un elemento de inventario específico de la base de datos y redirige a la lista de inventario.
}
