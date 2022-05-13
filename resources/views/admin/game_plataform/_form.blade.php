<!-- Name -->
<div>
    <x-label for="name" :value="__('Name')" />

    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" autofocus />
</div>

<!-- Company -->
<div class="block mt-4">
    <x-label for="company" :value="__('Company')" />

    <x-input id="company" class="block mt-1 w-full" type="text" name="company" :value="old('company')" autofocus />
</div>

<!-- Active -->
<div class="block mt-4">
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active">
        <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
    </label>
</div>