<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name', $gamePlataform->name ?? '')" autofocus />
    @if($errors->has('name'))
    @foreach($errors->get('name') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Acronym -->
<div class="block mt-4">
    <x-label for="acronym" :value="__('Acronym')" />

    <x-input id="acronym" class="block mt-1 w-full" type="text" name="acronym" :value="old('acronym', $gamePlataform->acronym ?? '')" autofocus />
    @if($errors->has('acronym'))
    @foreach($errors->get('acronym') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Company -->
<div class="block mt-4">
    <x-label for="company" :value="__('Company')" />

    <x-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company', $gamePlataform->company ?? '')" autofocus />
    @if($errors->has('company'))
    @foreach($errors->get('company') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Active -->
<div class="block mt-4">
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" @checked(old('is_active', $gamePlataform->is_active ?? true))>
        <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
    </label>
    @if($errors->has('is_active'))
    @foreach($errors->get('is_active') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>