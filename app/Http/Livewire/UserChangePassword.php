<?php

namespace App\Http\Livewire;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\MessageBag;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class UserChangePassword extends Component
{
    public string $current_password;
    public string $password;
    public string $password_confirmation;

    public array $rules = [
        'current_password' => 'required',
        'password' => 'required|min:6|confirmed',
    ];

    public function changePassword(): RedirectResponse|Redirector|MessageBag
    {
        $this->validate();

        if (!Hash::check($this->current_password, auth()->user()->password)) {
            return $this->addError('current_password', 'The last password is incorrect.');
        }

        auth()->user()->update([
            'password' => Hash::make($this->password),
        ]);

        return redirect()->route('user.profile', auth()->user()->id);
    }

    public function render(): View
    {
        return view('livewire.user-change-password');
    }
}
