<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class UserLogin extends Component
{
    public string $email;
    public string $password;

    protected array $rules = [
        'email' => ['required', 'min:3', 'email'],
        'password' => ['required', 'min:6', 'string']
    ];

    public function login(): RedirectResponse|MessageBag|Redirector
    {
        $this->validate();

        $credentials = [
            'email' => $this->email,
            'password' => $this->password
        ];

        if (!auth()->attempt($credentials)) {
            return $this->addError('credentials', 'Invalid credentials.');
        }

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.user-login');
    }
}
