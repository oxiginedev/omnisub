<?php

namespace App\Http\Livewire\Dashboard;

use App\Actions\Products\PurchaseAirtimeAction;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Airtime extends Component
{
    public function mount()
    {
        // fetch live airtime prices
    }

    public function purchaseAirtime(PurchaseAirtimeAction $purchaser)
    {
        // validate input i.e number, amount and network
        // get active provider
    }

    public function render(): View
    {
        return view('dashboard.airtime');
    }
}
