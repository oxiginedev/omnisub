<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render(): View
    {
        return view('dashboard.dashboard');
    }
}
