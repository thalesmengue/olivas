<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class UserRegister extends Component
{
    public string $name;
    public string $email;
    public string $password;

    protected array $rules = [
        'name' => ['required', 'min:3', 'string'],
        'email' => ['required', 'min:3', 'email'],
        'password' => ['required', 'min:6', 'string']
    ];

    public function register(): RedirectResponse|Redirector
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        return redirect()->route('user.login');
    }
    public function render(): View
    {
        return view('livewire.user-register');
    }
}
