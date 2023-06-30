<!-- index.blade.php -->
<h1>Inventario</h1>

<a href="{{ route('inventory.create') }}">Agregar nuevo elemento</a>

@if(session('success'))
    <div>{{ session('success') }}</div>
@endif

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cantidad</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inventory as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>
                    <a href="{{ route('inventory.show', $item->id) }}">Ver</a>
                    <a href="{{ route('inventory.edit', $item->id) }}">Editar</a>
                    <form action="{{ route('inventory.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
