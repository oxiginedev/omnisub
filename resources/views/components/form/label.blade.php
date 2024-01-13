@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-semibold text-sm text-secondary-700']) }}>
    {{ $value ?? $slot }}
</label>