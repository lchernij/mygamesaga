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
                <x-list>
                    @if($gamePlataforms->isEmpty())
                    {{ __('Empty list') }}
                    @else
                    @foreach($gamePlataforms as $gamePlataform)
                    <article class="flex items-start space-x-6 p-6">
                        <div class="min-w-0 relative flex-auto">
                            <h2 class="font-semibold text-slate-900 truncate pr-20">{{ $gamePlataform->name }}</h2>
                            <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                <div>
                                    <dt class="sr-only">{{ __('Acronym') }} </dt>
                                    <dd class="px-1.5 ring-1 ring-slate-200 rounded">{{ $gamePlataform->acronym }}</dd>
                                </div>
                                <div class="ml-2">
                                    <dt class="sr-only">{{ __('Company') }} </dt>
                                    <dd>{{ $gamePlataform->company }}</dd>
                                </div>
                                <div class="ml-2">
                                    <dt class="sr-only">{{ __('Status') }}</dt>
                                    <dd>{{ $gamePlataform->is_active }}</dd>
                                </div>
                            </dl>
                            <dl class="mt-2 flex flex-wrap text-sm leading-6 font-medium">
                                <a class="button" href="{{ route('game-plataforms.show', $gamePlataform) }}">
                                    <x-button class="ml-4">
                                        {{ __('More') }}
                                    </x-button>
                                </a>
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
                            </dl>
                        </div>
                    </article>
                    @endforeach
                    <div class="flex items-start space-x-6 p-6">
                        {{ $gamePlataforms->links() }}
                    </div>
                    @endif
                </x-list>
            </div>
        </div>
    </div>
</x-app-layout>