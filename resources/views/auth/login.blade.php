<x-layouts.guest title="Signup">
    <x-authentication-card title="{{ __('Login') }}">
        <form action="{{ route('login') }}" method="post">
            @csrf

            <div class="mt-4">
                <x-form.label for="email" value="{{ __('Email Address') }}" />
                <x-form.input type="email" inputmode="email" name="email" class="block w-full mt-1" placeholder="ogunmepon@omnisub.ng" required />
            </div>

            <div class="mt-4">
                <x-form.label for="password" value="{{ __('Password') }}" />
                <x-form.input type="password" name="password" class="block w-full mt-1" placeholder="Enter your password" required />
            </div>

            <div class="mt-6">
                <x-button.primary type="submit" class="w-full">
                    {{ __('Login to your dashboard') }}
                </x-button.primary>
            </div>
        </form>
    </x-authentication-card>
</x-layouts.guest>