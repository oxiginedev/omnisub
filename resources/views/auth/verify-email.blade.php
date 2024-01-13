<x-layouts.base title="">
    <div class="min-h-screen">
        <div class="flex flex-col sm:justify-center items-center">
            <div class="w-full max-w-lg mx-auto bg-white rounded">
                <h5 class="text-sm font-semibold uppercase tracking-widest">
                    {{ __('Please verify your email') }}
                </h5>
                <p>
                    {{ __('You\'re almost there! We sent an email to') }}
                </p>
                <p>
                    {{ __('Just click on the link in that email to complete your signup. If you don\'t see it, you may need to check your spam folder.') }}
                </p>

                <p>Still can't find the email?</p>

                <form action="{{ route('verification.send') }}" method="post">
                    @csrf

                    <x-button.primary type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                        <span>{{ __('Resend Email') }}</span>
                    </x-button.primary>
                </form>
            </div>
        </div>
    </div>
</x-layouts.base>
