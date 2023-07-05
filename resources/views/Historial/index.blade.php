<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1>Historial</h1>

                    <div class="table-actions">

                        <table class="table-container">
                            <thead>
                                <tr class="white-text">
                                    <th>ID</th>
                                    <th>Inventario</th>
                                    <th>Tipo</th>
                                    <th>Usuario</th>
                                    <th>Fecha</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($historial as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->inventory_id }}</td>
                                        <td>{{ $item->type }}</td>
                                        <td>
                                            @foreach ($item->user as $user)
                                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                    {{ $user->name }}
                                                </span>
                                            @endforeach
                                            
                                            {{ $item->user_id->name }}</td>



                                        <td>{{ $item->created_at->format('Y-m-d') }}</td>
                                        <td>Detalles...</td>
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
