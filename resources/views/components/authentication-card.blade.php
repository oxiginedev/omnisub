@props(['title'])

<div class="min-h-screen flex flex-col sm:justify-center items-center sm:pt-8 bg-secondary-100">
    <div>
        <a href="" class="text-3xl text-primary-600 font-bold">
            {{ __('omnisub') }}
        </a>
    </div>
    
    <div class="w-full max-w-md mt-6 mx-auto px-10 py-8 bg-white rounded-md shadow overflow-hidden">
        <div>
            <p class="text-sm text-center font-semibold uppercase tracking-widest">{{ $title }}</p>
        </div>
        <div class="mt-8">
            {{ $slot }}
        </div>
    </div>

    <div class="mt-5">
        @if (Route::is('register'))
            <p class="text-sm">
                Already have an account? <a href="{{ route('login') }}" class="hover:underline font-semibold">Login</a>
            </p>
        @else
            <div class="text-center">
                <p class="text-sm">
                    New to Omnisub? <a href="{{ route('register') }}" class="hover:underline font-semibold">Create an account</a>
                </p>
                <a href="{{ route('login') }}" class="text-sm hover:underline font-semibold">
                    {{ __('Forgot your password?') }}
                </a>
            </div>
        @endif
    </div>
</div>