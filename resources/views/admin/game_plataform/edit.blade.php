<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('game-plataforms.index') }}">
                {{ __('Game Plataform') }}
            </a>
            >
            <a href="{{ route('game-plataforms.show', $gamePlataform) }}">
                {{ $gamePlataform->name }}
            </a>
            > {{ __('Edit') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('game-plataforms.update', $gamePlataform) }}">
                        @csrf
                        @method('PATCH')

                        @include('admin.game_plataform._form')

                        <div class="flex items-center justify-end mt-4">
                            <x-button class="ml-4">
                                {{ __('Update') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>