<x-layouts.base title="{{ config('app.name') }} - Reliable platform to make bill payments">
    <div class="min-h-screen">
        @include('front.includes.navigation')

        <div>
            <section class="flex flex-col items-center py-12 max-w-6xl mx-auto">
                <h4 class="text-6xl text-center font-bold">
                    {{ __('All your utility subscriptions in one platform') }}
                </h4>
            </section>
        </div>
    </div>
</x-layouts.base>