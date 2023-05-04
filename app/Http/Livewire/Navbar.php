<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class Navbar extends Component
{
    public function logout(): RedirectResponse|Redirector
    {
        auth()->logout();

        return redirect()->route('user.login');
    }
    public function render(): View
    {
        return view('livewire.navbar');
    }
}
