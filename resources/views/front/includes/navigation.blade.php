<nav class="bg-white shadow">
    <div class="max-w-6xl mx-auto">
        <div class="flex items-center justify-between h-20">
            <div class="flex">
                <a href="/" class="text-2xl text-primary-600 font-semibold">
                    {{ __('omnisub') }}
                </a>
            </div>

            <div class="hidden md:flex md:items-center space-x-6">
                <a href="{{ route('register') }}">
                    <x-button.primary type="button">
                        {{ __('Create account') }}
                    </x-button.primary>
                </a>
            </div>
        </div>
    </div>
</nav>