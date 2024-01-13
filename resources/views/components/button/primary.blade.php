<button
    {{ $attributes->merge(['class' => 'relative inline-flex items-center justify-center space-x-2 cursor-pointer px-4 py-2.5 bg-primary-600 text-sm font-semibold text-white text-center rounded-md ease-out duration-200 outline-none transition-all outline-0 focus-visible:outline-4 focus-visible:outline-offset-1 border border-primary-700 hover:bg-primary-600/80 focus-visible:outline-primary-600 shadow-sm']) }}>
    {{ $slot }}
</button>
