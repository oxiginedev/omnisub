<x-layouts.guest title="Signup">
    <x-authentication-card title="{{ __('Create your account') }}">
        <form action="{{ route('register') }}" method="post">
            @csrf

            <div>
                <x-form.label for="name" value="{{ __('Full Name') }}" />
                <x-form.input type="text" name="name" class="block w-full mt-1" placeholder="Kehinde Nasiru" required />
            </div>

            <div class="mt-4">
                <x-form.label for="phone" value="{{ __('Phone Number') }}" />
                <x-form.input type="text" name="phone" class="block w-full mt-1" placeholder="08011111111" required />
            </div>

            <div class="mt-4">
                <x-form.label for="email" value="{{ __('Email Address') }}" />
                <x-form.input type="email" inputmode="email" name="email" class="block w-full mt-1" placeholder="ogunmepon@omnisub.ng" required />
            </div>

            <div class="mt-4">
                <x-form.label for="password" value="{{ __('Password') }}" />
                <x-form.input type="password" name="password" class="block w-full mt-1" placeholder="Enter your password" required />
            </div>

            <div class="mt-4">
                <x-form.label for="referral_code" value="{{ __('Referral Code(optional)') }}" />
                <x-form.input type="text" name="referral_code" class="block w-full mt-1" placeholder="Enter referral code" />
            </div>

            <div class="mt-5">
                <x-form.label for="terms">
                    <div class="flex items-center">
                        <div class="text-center">
                            {!! __('By signing up, you agree to oir :terms_of_service and :privacy_policy', [
                                    'terms_of_service' => '<a target="_blank" href="'.route('login').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-semibold">'.__('Terms of Service').'</a>',
                                    'privacy_policy' => '<a target="_blank" href="'.route('login').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 font-semibold">'.__('Privacy Policy').'</a>',
                            ]) !!}
                        </div>
                    </div>
                </x-form.label>
            </div>

            <div class="mt-6">
                <x-button.primary type="submit" class="w-full">
                    {{ __('Sign up to your dashboard') }}
                </x-button.primary>
            </div>
        </form>
    </x-authentication-card>
</x-layouts.guest>