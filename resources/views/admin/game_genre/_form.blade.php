<!-- Name EN -->
<div>
    <x-label for="name" :value="__('Name') . ' EN'" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $gameGenre->name ?? '')" autofocus />
    @if($errors->has('name'))
    @foreach($errors->get('name') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Name PT_BR -->
<div class="block mt-4">
    <x-label for="pt_br_name" :value="__('Name') . ' PT_BR'" />

    <x-input id="pt_br_name" class="block mt-1 w-full" type="text" name="pt_br_name" :value="old('pt_br_name', $gameGenre->pt_br_name ?? '')" autofocus />
    @if($errors->has('pt_br_name'))
    @foreach($errors->get('pt_br_name') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Acronym -->
<div class="block mt-4">
    <x-label for="acronym" :value="__('Acronym')" />

    <x-input id="acronym" class="block mt-1 w-full" type="text" name="acronym" :value="old('acronym', $gameGenre->acronym ?? '')" autofocus />
    @if($errors->has('acronym'))
    @foreach($errors->get('acronym') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Description EN -->
<div class="block mt-4">
    <x-label for="description" :value="__('Description') . ' EN'" />

    <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="old('description', $gameGenre->description ?? '')" autofocus />
    @if($errors->has('description'))
    @foreach($errors->get('description') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Description PT_BR -->
<div class="block mt-4">
    <x-label for="pt_br_description" :value="__('Description') . ' PT_BR'" />

    <x-input id="pt_br_description" class="block mt-1 w-full" type="text" name="pt_br_description" :value="old('pt_br_description', $gameGenre->pt_br_description ?? '')" autofocus />
    @if($errors->has('pt_br_description'))
    @foreach($errors->get('pt_br_description') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Active -->
<div class="block mt-4">
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" @checked(old('is_active', $gameGenre->is_active ?? true))>
        <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
    </label>
    @if($errors->has('is_active'))
    @foreach($errors->get('is_active') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>