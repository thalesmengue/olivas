<?php

namespace App\Http\Livewire;

use App\Events\Registered;
use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Redirector;
use Livewire\WithFileUploads;
use Livewire\Component;

class ClientsCreate extends Component
{
    use WithFileUploads;

    public string $name;
    public string $email;
    public string $phone;
    public $image;
    public string $legal_regime;


    protected array $rules = [
        'name' => ['required', 'min:3', 'string'],
        'email' => ['required', 'min:3', 'email'],
        'phone' => ['required', 'min:3', 'string'],
        'image' => ['required', 'image'],
        'legal_regime' => ['required', 'string']
    ];

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $client = Client::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image->store('clients', 'public'),
            'legal_regime' => $this->legal_regime
        ]);

        event(new Registered($client));

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.clients-create');
    }
}
