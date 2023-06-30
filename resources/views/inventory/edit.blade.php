<!-- edit.blade.php -->
<h1>Editar elemento de inventario</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('inventory.update', $inventory->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name', $inventory->name) }}">
    </div>
    <div>
        <label for="quantity">Cantidad:</label>
        <input type="number" name="quantity" id="quantity" value="{{ old('quantity', $inventory->quantity) }}">
    </div>
    <button type="submit">Guardar</button>
</form>
