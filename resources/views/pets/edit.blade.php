<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Editar Mascota') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <form action="{{ route('pets.update', $pet) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Nombre -->
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre de la Mascota *</label>
                                <input type="text" name="name" id="name" value="{{ old('name', $pet->name) }}" 
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('name')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Especie -->
                            <div>
                                <label for="species" class="block text-sm font-medium text-gray-700">Especie *</label>
                                <select name="species" id="species" 
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <option value="">Seleccionar especie</option>
                                    <option value="perro" {{ old('species', $pet->species) == 'perro' ? 'selected' : '' }}>Perro</option>
                                    <option value="gato" {{ old('species', $pet->species) == 'gato' ? 'selected' : '' }}>Gato</option>
                                    <option value="ave" {{ old('species', $pet->species) == 'ave' ? 'selected' : '' }}>Ave</option>
                                    <option value="roedor" {{ old('species', $pet->species) == 'roedor' ? 'selected' : '' }}>Roedor</option>
                                    <option value="reptil" {{ old('species', $pet->species) == 'reptil' ? 'selected' : '' }}>Reptil</option>
                                    <option value="otro" {{ old('species', $pet->species) == 'otro' ? 'selected' : '' }}>Otro</option>
                                </select>
                                @error('species')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Raza -->
                            <div>
                                <label for="breed" class="block text-sm font-medium text-gray-700">Raza</label>
                                <input type="text" name="breed" id="breed" value="{{ old('breed', $pet->breed) }}"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                       placeholder="Ej: Labrador, Siames, etc.">
                                @error('breed')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Edad -->
                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700">Edad (años) *</label>
                                <input type="number" name="age" id="age" value="{{ old('age', $pet->age) }}" min="0" max="50"
                                       class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                       required>
                                @error('age')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Dueño (solo para admin/staff) -->
                            @if(auth()->user()->isAdmin() || auth()->user()->isStaff())
                            <div class="md:col-span-2">
                                <label for="owner_id" class="block text-sm font-medium text-gray-700">Dueño *</label>
                                <select name="owner_id" id="owner_id" 
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <option value="">Seleccionar dueño</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('owner_id', $pet->owner_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('owner_id')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            @else
                                <input type="hidden" name="owner_id" value="{{ auth()->id() }}">
                            @endif

                            <!-- Historial Médico -->
                            <div class="md:col-span-2">
                                <label for="medical_history" class="block text-sm font-medium text-gray-700">Historial Médico</label>
                                <textarea name="medical_history" id="medical_history" rows="4"
                                          class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                          placeholder="Información médica relevante, alergias, tratamientos, etc.">{{ old('medical_history', $pet->medical_history) }}</textarea>
                                @error('medical_history')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Estado -->
                            <div>
                                <label for="is_active" class="block text-sm font-medium text-gray-700">Estado *</label>
                                <select name="is_active" id="is_active"
                                        class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm py-2 px-3 focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                        required>
                                    <option value="1" {{ old('is_active', $pet->is_active) == 1 ? 'selected' : '' }}>Activo</option>
                                    <option value="0" {{ old('is_active', $pet->is_active) == 0 ? 'selected' : '' }}>Inactivo</option>
                                </select>
                                @error('is_active')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Botones -->
                        <div class="mt-8 flex justify-end space-x-3">
                            <a href="{{ route('pets.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                                Cancelar
                            </a>
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Actualizar Mascota
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>