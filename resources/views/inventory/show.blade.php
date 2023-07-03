<!-- show.blade.php -->
<h1>Detalles del elemento de inventario</h1>

<p>ID: {{ $inventory->id }}</p>
<p>Nombre: {{ $inventory->name }}</p>
<p>Cantidad: {{ $inventory->equipo }}</p>

<a href="{{ route('inventory.index') }}">Volver</a>
