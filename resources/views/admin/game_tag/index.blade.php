<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Game Tag') }} ({{$gameTags->total()}})

        </h2>
    </x-slot>
    <x-slot name="pageActions">
        <x-page-actions>
            <a href="{{ route('game-tags.create') }}">
                <x-button class="ml-4">
                    {{ __('Add new') }}
                </x-button>
            </a>
        </x-page-actions>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-list>
                    @if($gameTags->isEmpty())
                    {{ __('Empty list') }}
                    @else
                    @foreach($gameTags as $gameTag)
                    <article class="flex items-start space-x-6 p-6">
                        <div class="min-w-0 relative flex-auto">
                            <h2 class="font-semibold text-slate-900 truncate pr-20">{{ $gameTag->en_us_name }}</h2>
                            <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                <div class="ml-2">
                                    <dt class="sr-only">{{ __('name PT_BR') }} </dt>
                                    <dd>{{ $gameTag->pt_br_name }}</dd>
                                </div>
                                <div class="ml-2">
                                    <dt class="sr-only">{{ __('Status') }}</dt>
                                    <dd>{{ $gameTag->is_active }}</dd>
                                </div>
                            </dl>
                            <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                <a class="button" href="{{ route('game-tags.show', $gameTag) }}">
                                    <x-button class="ml-4">
                                        {{ __('More') }}
                                    </x-button>
                                </a>
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
                            </dl>
                        </div>
                    </article>
                    @endforeach
                    <div class="flex items-start space-x-6 p-6">
                        {{ $gameTags->links() }}
                    </div>
                    @endif
                </x-list>
            </div>
        </div>
    </div>
</x-app-layout>