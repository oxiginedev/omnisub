<div {{ $attributes->merge(['class' => 'flex items-center space-x-4 lg:px-6 py-8 cursor-pointer rounded-md shadow overflow-hidden']) }}>
    <div class="shrink-0">
        {{ $icon }}
    </div>
    <div class="flex-1 flex flex-col">
        <p class="text-sm font-semibold">{{ $title }}</p>
        <p class="text-2xl font-semibold">{{ $value }}</p>
    </div>
</div>