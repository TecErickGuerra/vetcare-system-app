<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detalles de la Mascota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <div class="flex justify-between items-start mb-6">
                        <h3 class="text-2xl font-bold text-gray-900">{{ $pet->name }}</h3>
                        <span class="px-3 py-1 text-sm font-medium rounded-full 
                            @if($pet->is_active) bg-green-100 text-green-800
                            @else bg-red-100 text-red-800
                            @endif">
                            @if($pet->is_active) Activo
                            @else Inactivo
                            @endif
                        </span>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Información básica -->
                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Información Básica</h4>
                            <dl class="space-y-4">
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Especie</dt>
                                    <dd class="text-sm text-gray-900 capitalize">{{ $pet->species }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Raza</dt>
                                    <dd class="text-sm text-gray-900">{{ $pet->breed ?? 'No especificada' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Edad</dt>
                                    <dd class="text-sm text-gray-900">{{ $pet->age }} años</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Dueño</dt>
                                    <dd class="text-sm text-gray-900">{{ $pet->owner->name ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Email del Dueño</dt>
                                    <dd class="text-sm text-gray-900">{{ $pet->owner->email ?? 'N/A' }}</dd>
                                </div>
                                <div>
                                    <dt class="text-sm font-medium text-gray-500">Fecha de Registro</dt>
                                    <dd class="text-sm text-gray-900">{{ $pet->created_at->format('d/m/Y H:i') }}</dd>
                                </div>
                            </dl>
                        </div>

                        <!-- Historial médico -->
                        <div>
                            <h4 class="text-lg font-medium text-gray-900 mb-4">Historial Médico</h4>
                            @if($pet->medical_history)
                                <div class="bg-gray-50 rounded-lg p-4">
                                    <p class="text-sm text-gray-700 whitespace-pre-line">{{ $pet->medical_history }}</p>
                                </div>
                            @else
                                <p class="text-sm text-gray-500 italic">No hay historial médico registrado.</p>
                            @endif
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end space-x-3">
                        @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                            <a href="{{ route('pets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Volver al Listado
                            </a>
                        @else
                            <a href="{{ route('pets.my-pets') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Volver a Mis Mascotas
                            </a>
                        @endif
                        <a href="{{ route('pets.edit', $pet) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Editar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>