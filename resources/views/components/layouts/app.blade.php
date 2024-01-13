<x-layouts.base title="Omnisub">
    <div x-data="{ sidebarOpen: false }" @keydown.window.escape="sidebarOpen = false" class="h-screen flex overflow-hidden bg-secondary-100">
        <x-layouts.app.sidebar />

        <div class="flex flex-col w-0 flex-1 overflow-hidden overflow-y-auto">
            <x-layouts.app.header />
            
            <main class="flex-1 relative z-0 py-3 lg:py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6">
                    {{ $slot }}
                </div>
            </main>
        </div>
    </div>
</x-layouts.base>