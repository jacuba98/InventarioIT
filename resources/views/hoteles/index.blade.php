<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                @foreach($hotel as $item)
                    <div class="learning-card">
                        <h3>{{ $item->descripcion}}</h3>
                        <h2>{{ $item->name}}</h2>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
