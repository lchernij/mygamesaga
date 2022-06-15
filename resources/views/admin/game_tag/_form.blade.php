<!-- Name EN_US -->
<div>
    <x-label for="en_us_name" :value="__('Name') . ' EN_US'" />

    <x-input id="en_us_name" class="block mt-1 w-full" type="text" name="en_us_name" :value="old('en_us_name', $gameTag->en_us_name ?? '')" autofocus />
    @if($errors->has('en_us_name'))
    @foreach($errors->get('en_us_name') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Name PT_BR -->
<div class="block mt-4">
    <x-label for="pt_br_name" :value="__('Name') . ' PT_BR'" />

    <x-input id="pt_br_name" class="block mt-1 w-full" type="text" name="pt_br_name" :value="old('pt_br_name', $gameTag->pt_br_name ?? '')" autofocus />
    @if($errors->has('pt_br_name'))
    @foreach($errors->get('pt_br_name') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>

<!-- Active -->
<div class="block mt-4">
    <label for="is_active" class="inline-flex items-center">
        <input id="is_active" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="is_active" @checked(old('is_active', $gameTag->is_active ?? true))>
        <span class="ml-2 text-sm text-gray-600">{{ __('Active') }}</span>
    </label>
    @if($errors->has('is_active'))
    @foreach($errors->get('is_active') as $error)
    <x-label :value="$error" />
    @endforeach
    @endif
</div>