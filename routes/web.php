<?php

use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\RegistroController;
use App\Models\Historial;
use App\Models\Hotel;
use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\Attributes\Group;


Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
Route::get('/empleado/create', [EmpleadoController::class, 'create'])->name('empleado.create');
Route::post('/empleado', [EmpleadoController::class, 'store'])->name('empleado.store');
Route::get('/empleado/{id}', [EmpleadoController::class, 'show'])->name('empleado.show');
Route::get('/empleado/{id}/edit', [EmpleadoController::class, 'edit'])->name('empleado.edit');
Route::put('/empleado/{id}', [EmpleadoController::class, 'update'])->name('empleado.update');
Route::delete('/empleado/{id}', [EmpleadoController::class, 'destroy'])->name('empleado.destroy');


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => 'auth'], function () {
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory.index');
    Route::get('/inventory/create', [InventoryController::class, 'create'])->name('inventory.create');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::get('/inventory/{id}', [InventoryController::class, 'show'])->name('inventory.show');
    Route::get('/inventory/{id}/edit', [InventoryController::class, 'edit'])->name('inventory.edit');
    Route::put('/inventory/{id}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{id}', [InventoryController::class, 'destroy'])->name('inventory.destroy');
});

Route::get('/hoteles', function () {
    $hotel = Hotel::all();
    return view('hoteles/index', compact('hotel'));
})->middleware(['auth', 'verified'])->name('hoteles');

Route::get('/historial', function () {
    //$historial = Historial::all();
    $historial = Historial::with('user')->get();

    //dd($historial);

    return view('historial/index', compact('historial'));
})->middleware(['auth', 'verified'])->name('historial');

Route::middleware('registro')->group(function () {
    Route::get('/registro', [RegistroController::class, 'index'])->name('registro.index');
    //Route::get('/registro', [RegistroController::class, 'edit'])->name('registro.edit');
    //Route::patch('/registro', [RegistroController::class, 'update'])->name('registro.update');
    //Route::delete('/registro', [RegistroController::class, 'destroy'])->name('registro.destroy');
});

Route::middleware('empleado')->group(function () {
    //Route::get('/empleado', [EmpleadoController::class, 'index'])->name('empleado.index');
    //Route::get('/registro', [RegistroController::class, 'edit'])->name('registro.edit');
    //Route::patch('/registro', [RegistroController::class, 'update'])->name('registro.update');
    //Route::delete('/registro', [RegistroController::class, 'destroy'])->name('registro.destroy');
});

require __DIR__.'/auth.php';
