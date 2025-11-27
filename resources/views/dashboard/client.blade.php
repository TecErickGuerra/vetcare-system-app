<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mi Panel - VetCare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Bienvenido, {{ Auth::user()->name }}</h3>
                    <p class="text-gray-600 mb-6">Gracias por confiar en VetCare para el cuidado de tus mascotas.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <a href="{{ route('pets.my-pets') }}" class="block p-6 bg-blue-50 border border-blue-200 rounded-lg hover:bg-blue-100 transition duration-150">
                            <div class="flex items-center">
                                <svg class="h-8 w-8 text-blue-600 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                                </svg>
                                <div>
                                    <h4 class="text-lg font-semibold text-blue-700">Mis Mascotas</h4>
                                    <p class="text-blue-600 text-sm">Ver y gestionar mis mascotas</p>
                                </div>
                            </div>
                        </a>

                        <div class="p-6 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center">
                                <svg class="h-8 w-8 text-green-600 mr-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                                </svg>
                                <div>
                                    <h4 class="text-lg font-semibold text-green-700">Mi Perfil</h4>
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

                    <!-- Información adicional para clientes -->
                    <div class="mt-8 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                        <h4 class="text-md font-semibold text-yellow-800 mb-2">¿Necesitas ayuda?</h4>
                        <p class="text-yellow-700 text-sm">Contacta con nuestro staff veterinario para cualquier consulta sobre tus mascotas.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>