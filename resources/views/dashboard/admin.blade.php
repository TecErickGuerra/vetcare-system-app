<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Panel de Administración - VetCare') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Versión SUPER SIMPLE -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <h3 class="text-2xl font-bold text-green-600 mb-4">¡Sistema Funcionando!</h3>
                    <p class="text-gray-700 mb-4">El login y autenticación están trabajando correctamente.</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-blue-50 p-4 rounded-lg">
                            <p class="font-semibold">Usuarios Totales</p>
                            <p class="text-2xl">{{ \App\Models\User::count() }}</p>
                        </div>
                        <div class="bg-green-50 p-4 rounded-lg">
                            <p class="font-semibold">Mascotas Totales</p>
                            <p class="text-2xl">{{ \App\Models\Pet::count() }}</p>
                        </div>
                        <div class="bg-purple-50 p-4 rounded-lg">
                            <p class="font-semibold">Administradores</p>
                            <p class="text-2xl">{{ \App\Models\User::where('role_id', 1)->count() }}</p>
                        </div>
                    </div>

                    <div class="bg-yellow-50 border border-yellow-200 p-4 rounded-lg">
                        <p class="text-yellow-800">
                            <strong>Próximo paso:</strong> Configurar las rutas de gestión una por una.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>