<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- show.blade.php -->
                    <h1>Detalles</h1>

                    <a href="{{ route('inventory.index') }}">Volver</a>

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
                            <tr>
                                <td>{{ $inventory->id }}</td>
                                <td>{{ $inventory->name }}</td>
                                <td>{{ $inventory->equipo }}</td>
                                <td>
                                    <a href="{{ route('inventory.edit', $inventory->id) }}" class="button-gp edit" class="button">Edit</a>

                                    <form action="{{ route('inventory.destroy', $inventory->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="button-gp delete">Eliminar</button>
                                    </form>
                                  </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

