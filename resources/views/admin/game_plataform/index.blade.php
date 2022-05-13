<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Plataform') }} ({{$gamePlataforms->total()}})
            <a href="{{ route('game-plataforms.create') }}">
                <x-button class="ml-4">
                    {{ __('Add new') }}
                </x-button>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if($gamePlataforms->isEmpty())
                    {{ __('Empty list') }}
                    @else
                    @foreach($gamePlataforms as $gamePlataform)
                    <div>
                        {{ $gamePlataform->name }}
                        -
                        {{ $gamePlataform->company }}
                        -
                        {{ $gamePlataform->is_active }}
                        <a class="button" href="{{ route('game-plataforms.edit', $gamePlataform) }}">
                            <x-button class="ml-4">
                                {{ __('Edit') }}
                            </x-button>
                        </a>
                    </div>
                    @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>