<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mis Mascotas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    @if($pets->count() > 0)
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($pets as $pet)
                                <div class="border border-gray-200 rounded-lg p-6 hover:shadow-md transition duration-150">
                                    <div class="flex items-center justify-between mb-4">
                                        <h3 class="text-lg font-semibold text-gray-900">{{ $pet->name }}</h3>
                                        <span class="px-2 py-1 text-xs font-medium rounded-full 
                                            @if($pet->is_active) bg-green-100 text-green-800
                                            @else bg-red-100 text-red-800
                                            @endif">
                                            @if($pet->is_active) Activo
                                            @else Inactivo
                                            @endif
                                        </span>
                                    </div>
                                    
                                    <div class="space-y-2 text-sm text-gray-600">
                                        <div class="flex justify-between">
                                            <span>Especie:</span>
                                            <span class="font-medium capitalize">{{ $pet->species }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Raza:</span>
                                            <span class="font-medium">{{ $pet->breed ?? 'N/A' }}</span>
                                        </div>
                                        <div class="flex justify-between">
                                            <span>Edad:</span>
                                            <span class="font-medium">{{ $pet->age }} años</span>
                                        </div>
                                    </div>

                                    @if($pet->medical_history)
                                        <div class="mt-4">
                                            <h4 class="text-sm font-medium text-gray-700 mb-2">Historial Médico:</h4>
                                            <p class="text-sm text-gray-600">{{ Str::limit($pet->medical_history, 100) }}</p>
                                        </div>
                                    @endif

                                    <div class="mt-6 flex space-x-2">
                                        <a href="{{ route('pets.show-my-pet', $pet) }}" class="flex-1 bg-blue-500 hover:bg-blue-600 text-white text-center py-2 px-4 rounded text-sm">
                                            Ver Detalles
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-8">
                            <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                            </svg>
                            <h3 class="mt-4 text-lg font-medium text-gray-900">No tienes mascotas registradas</h3>
                            <p class="mt-2 text-sm text-gray-500">Contacta con el staff para registrar tu primera mascota.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>