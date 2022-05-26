<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('game-genres.index') }}">
                {{ __('Game Genre') }}
            </a>
            > {{ $gameGenre->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="block">
                        <x-label :value="__('Name'). ' EN'" />
                        <x-label :value="$gameGenre->name" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Name') . ' PT_BR'" />
                        <x-label :value="$gameGenre->pt_br_name" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Acronym')" />
                        <x-label :value="$gameGenre->acronym" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Description') . ' EN'" />
                        <x-label :value="$gameGenre->description" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Description') . ' PT_BR'" />
                        <x-label :value="$gameGenre->pt_br_description" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Active')" />
                        <x-label :value="$gameGenre->is_active" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Created at')" />
                        <x-label :value="$gameGenre->created_at" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Updated at')" />
                        <x-label :value="$gameGenre->updated_at" />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                        <a class="button" href="{{ route('game-genres.edit', $gameGenre) }}">
                            <x-button class="ml-4">
                                {{ __('Edit') }}
                            </x-button>
                        </a>
                        @if($gameGenre->is_active)
                        <a class="button" href="{{ route('game-genres.inactive', $gameGenre) }}">
                            <x-button class="ml-4">
                                {{ __('Inactive') }}
                            </x-button>
                        </a>
                        @else
                        <a class="button" href="{{ route('game-genres.active', $gameGenre) }}">
                            <x-button class="ml-4">
                                {{ __('Active') }}
                            </x-button>
                        </a>
                        @endif
                        <form method="POST" action="{{ route('game-genres.destroy', $gameGenre) }}">
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