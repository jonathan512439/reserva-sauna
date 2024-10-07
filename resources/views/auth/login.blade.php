<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gray-100">
        <div class="w-full max-w-md bg-white shadow-md rounded-lg p-6">
            <x-authentication-card>
                <x-slot name="logo">
                    <!-- Logo personalizado aquí -->
                </x-slot>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Campos de email y contraseña aquí -->
                </form>
            </x-authentication-card>
        </div>
    </div>
</x-guest-layout>
