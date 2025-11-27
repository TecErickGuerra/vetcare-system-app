<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Staff - VetCare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p class="text-gray-600 mb-6">Como miembro del staff, puedes gestionar las mascotas del sistema.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('pets.index') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition duration-150">
                            <div class="flex items-center">
                                <svg class="h-8 w-8 text-blue-600 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                <div>
                                    <h4 class="text-lg font-semibold text-blue-700">Gestión de Mascotas</h4>
                                    <p class="text-blue-600 text-sm">Administrar todas las mascotas</p>
                                </div>
                            </div>
                        </a>

                        <div class="p-6 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="h-8 w-8 text-green-600 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                                </svg>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-700">Información</h4>
                                    <p class="text-green-600 text-sm">
                                        Rol: 
                                        @if(Auth::user()->role_id == 1)
                                            Administrador
                                        @elseif(Auth::user()->role_id == 2)
                                            Staff
                                        @else
                                            Cliente
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>