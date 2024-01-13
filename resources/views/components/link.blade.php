@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'flex items-center space-x-2 px-5 py-1.5 text-[15px] leading-6 font-semibold text-sky-600 bg-slate-800/70 focus:outline-none transition ease-in-out duration-150'
                : 'flex items-center space-x-2 px-5 py-1.5 text-[15px] leading-6 font-medium text-white hover:bg-slate-800/70 focus:outline-none focus:text-white focus:bg-primary-900 transition ease-in-out duration-150';
@endphp

<a wire:navigate {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>