<!-- create.blade.php -->
<h1>Agregar nuevo elemento de inventario</h1>

@if($errors->any())
    <ul>
        @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

<form action="{{ route('inventory.store') }}" method="POST">
    @csrf
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
    </div>
    <div>
        <label for="equipo">Equipo:</label>
        <input type="text" name="equipo" id="equipo" value="{{ old('equipo') }}">
    </div>
    <button type="submit">Guardar</button>
</form>
