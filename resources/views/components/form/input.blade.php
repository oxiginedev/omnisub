@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'border-secondary-300 focus:border-secondary-800 focus:outline-none focus:ring-0 rounded transition ease-in duration-150']) !!}>