<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center">
                <span class="text-lg font-semibold">VetCare System</span>
            </div>

            <!-- Después del logo, se añade esto: -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
            </x-nav-link>
    
            <!-- SOLO estas dos rutas que ya existen -->
            <x-nav-link :href="route('admin.users.index')" :active="request()->routeIs('admin.users.*')">
                {{ __('Usuarios') }}
            </x-nav-link>
    
            <x-nav-link :href="route('pets.index')" :active="request()->routeIs('pets.*')">
                {{ __('Mascotas') }}
                </x-nav-link>
            </div>

            <div class="flex items-center space-x-4">
                <span class="text-sm text-gray-700">Hola, {{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm text-gray-500 hover:text-gray-700">
                        Cerrar Sesión
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>