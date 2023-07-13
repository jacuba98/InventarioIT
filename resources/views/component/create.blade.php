<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h5>Nuevo Componente</h5>

                    @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <form action="{{ route('component.store') }}" method="POST" class="form-gp">
                        @csrf
                        <div>
                            <label for="no_equipo" class="label-gp">No. Equipo:</label>
                            <input type="text" name="no_equipo" id="no_equipo" value="{{ old('name') }}" class="input-gp">
                        </div>
                        <div>
                            <label for="equipo" class="label-gp">Equipo:</label>
                            <input type="text" name="equipo" id="equipo" value="{{ old('equipo') }}" class="input-gp">
                        </div>
                        <button type="submit" class="button-gp-create">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
