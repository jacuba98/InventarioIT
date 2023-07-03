<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- index.blade.php -->
                    <h1>Inventario</h1>

                    <div class="table-actions">
                        <form action="{{ route('inventory.create') }}" method="GET" style="display: inline;">
                            <button type="submit" class="button-gp create">Agregar</button>
                        </form>

                        @if(session('success'))
                            <div>{{ session('success') }}</div>
                        @endif

                        <table class="table-container">
                            <thead>
                                <tr class="white-text">
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Equipo</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($inventory as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->equipo }}</td>
                                        <td>
                                            <a href="{{ route('inventory.show', $item->id) }}" class="button-gp show">Ver</a>
                                            <a href="{{ route('inventory.edit', $item->id) }}" class="button-gp edit">Editar</a>
                                            <form action="{{ route('inventory.destroy', $item->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="button-gp delete">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
