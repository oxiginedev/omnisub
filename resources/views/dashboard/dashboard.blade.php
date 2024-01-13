<div>
    <div class="grid grid-cols-3 gap-5">
        <div
            class="flex items-center space-x-4 px-6 py-8 cursor-pointer bg-primary-600 bg-patterned shadow text-white rounded-md overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="shrink-0 w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M21 12a2.25 2.25 0 0 0-2.25-2.25H15a3 3 0 1 1-6 0H5.25A2.25 2.25 0 0 0 3 12m18 0v6a2.25 2.25 0 0 1-2.25 2.25H5.25A2.25 2.25 0 0 1 3 18v-6m18 0V9M3 12V9m18 0a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 9m18 0V6a2.25 2.25 0 0 0-2.25-2.25H5.25A2.25 2.25 0 0 0 3 6v3" />
            </svg>
            <div class="flex flex-col">
                <p class="text-sm font-semibold">{{ __('Available Balance') }}</p>
                <p class="text-2xl font-bold">&#8358;{{ number_format(40000, 2) }}</p>
            </div>
        </div>

        <div class="flex items-center space-x-4 px-6 py-8 cursor-pointer bg-white shadow rounded-md overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="shrink-0 w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M3 7.5 7.5 3m0 0L12 7.5M7.5 3v13.5m13.5 0L16.5 21m0 0L12 16.5m4.5 4.5V7.5" />
            </svg>
            <div class="flex flex-col">
                <p class="text-sm font-semibold">{{ __('Total Transactions') }}</p>
                <p class="text-2xl font-bold">&#8358;{{ number_format(5605000, 2) }}</p>
            </div>
        </div>

        <div class="flex items-center space-x-4 px-6 py-8 cursor-pointer bg-white shadow rounded-md overflow-hidden">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="shrink-0 w-10 h-10">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8.25 9.75h4.875a2.625 2.625 0 0 1 0 5.25H12M8.25 9.75 10.5 7.5M8.25 9.75 10.5 12m9-7.243V21.75l-3.75-1.5-3.75 1.5-3.75-1.5-3.75 1.5V4.757c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0 1 11.186 0c1.1.128 1.907 1.077 1.907 2.185Z" />
            </svg>
            <div class="flex flex-col">
                <p class="text-sm font-semibold">{{ __('Pending Cashbacks') }}</p>
                <p class="text-2xl font-bold">&#8358;{{ number_format(350, 2) }}</p>
            </div>
        </div>
    </div>

    <div class="mt-8 bg-white shadow overflow-hidden rounded-md">
        <div class="flex items-center justify-between p-4">
            <h3 class="font-semibold">Recent Transactions</h3>
            <a href="{{ route('transactions') }}" wire:navigate class="text-sm text-blue-600 font-semibold">
                {{ __('See all') }}
            </a>
        </div>

        <table class="w-full">
            <thead class="bg-secondary-100 border-y border-secondary-200">
                <th class="px-4 py-3 text-xs uppercase font-semibold tracking-widest text-left">Date</th>
                <th class="px-4 py-3 text-xs uppercase font-semibold tracking-widest text-left">Amount</th>
                <th class="px-4 py-3 text-xs uppercase font-semibold tracking-widest text-left">Description</th>
                <th class="px-4 py-3 text-xs uppercase font-semibold tracking-widest text-left">Type</th>
                <th class="px-4 py-3 text-xs uppercase font-semibold tracking-widest text-left">Status</th>
                <th></th>
            </thead>
        </table>

        <div class="p-5 text-sm text-secondary-600 text-center">
            <p>{{ __('No transactions has occured, yet.') }}</p>
        </div>
    </div>
</div>
