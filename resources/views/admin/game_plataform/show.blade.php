<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('game-plataforms.index') }}">
                {{ __('Game Plataform') }}
            </a>
            > {{ $gamePlataform->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="block">
                        <x-label :value="__('Name')" />
                        <x-label :value="$gamePlataform->name" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Acronym')" />
                        <x-label :value="$gamePlataform->acronym" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Company')" />
                        <x-label :value="$gamePlataform->company" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Status')" />
                        <x-label :value="$gamePlataform->is_active" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Created at')" />
                        <x-label :value="$gamePlataform->created_at" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Updated at')" />
                        <x-label :value="$gamePlataform->updated_at" />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                        <a class="button" href="{{ route('game-plataforms.edit', $gamePlataform) }}">
                            <x-button class="ml-4">
                                {{ __('Edit') }}
                            </x-button>
                        </a>
                        @if($gamePlataform->is_active)
                        <a class="button" href="{{ route('game-plataforms.inactive', $gamePlataform) }}">
                            <x-button class="ml-4">
                                {{ __('Inactive') }}
                            </x-button>
                        </a>
                        @else
                        <a class="button" href="{{ route('game-plataforms.active', $gamePlataform) }}">
                            <x-button class="ml-4">
                                {{ __('Active') }}
                            </x-button>
                        </a>
                        @endif
                        <form method="POST" action="{{ route('game-plataforms.destroy', $gamePlataform) }}">
                            @csrf
                            @method('DELETE')

                            <x-button class="ml-4">
                                {{ __('Delete') }}
                            </x-button>
                        </form>
                    </dl>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>