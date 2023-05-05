<?php

namespace App\Http\Livewire;

use App\Events\DeletedUser;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class UserProfile extends Component
{
    public User|null $user;
    public string $name;
    public string $email;
    public string $password;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'string'],
            'email' => ['required', 'min:3', 'email', 'unique:users,email,' . $this->user->id],
            'password' => ['nullable', 'min:6', 'string']
        ];
    }


    public function mount(): void
    {
        $this->user = auth()->user();
        $this->name = $this->user->name;
        $this->email = $this->user->email;
    }

    public function deleteAccount(): RedirectResponse|Redirector
    {
        event(new DeletedUser(auth()->user()));

        $this->user->delete();

        return redirect()->route('user.login');
    }

    public function update(): RedirectResponse|Redirector
    {
        $this->validate();

        $user = auth()->user();
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password
        ]);

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.user-profile');
    }
}
