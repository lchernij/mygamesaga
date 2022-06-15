<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <a href="{{ route('game-tags.index') }}">
                {{ __('Game Tag') }}
            </a>
            > {{ $gameTag->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="block">
                        <x-label :value="__('Name') . ' PT_BR'" />
                        <x-label :value="$gameTag->pt_br_name" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Name'). ' EN_US'" />
                        <x-label :value="$gameTag->name" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Active')" />
                        <x-label :value="$gameTag->is_active" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Created at')" />
                        <x-label :value="$gameTag->created_at" />
                    </div>

                    <div class="block mt-4">
                        <x-label :value="__('Updated at')" />
                        <x-label :value="$gameTag->updated_at" />
                    </div>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                        <a class="button" href="{{ route('game-tags.edit', $gameTag) }}">
                            <x-button class="ml-4">
                                {{ __('Edit') }}
                            </x-button>
                        </a>
                        @if($gameTag->is_active)
                        <a class="button" href="{{ route('game-tags.inactive', $gameTag) }}">
                            <x-button class="ml-4">
                                {{ __('Inactive') }}
                            </x-button>
                        </a>
                        @else
                        <a class="button" href="{{ route('game-tags.active', $gameTag) }}">
                            <x-button class="ml-4">
                                {{ __('Active') }}
                            </x-button>
                        </a>
                        @endif
                        <form method="POST" action="{{ route('game-tags.destroy', $gameTag) }}">
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