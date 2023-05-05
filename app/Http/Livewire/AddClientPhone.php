<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class AddClientPhone extends Component
{
    public string $phone;
    public Client|null $client;

    protected array $rules = [
        'phone' => ['required', 'digits:11', 'numeric']
    ];

    public function addPhone(): RedirectResponse|Redirector
    {
        $this->validate();

        $this->client->phones()->create([
           'phone' => $this->phone,
           'client_id' => $this->client->id
        ]);

        return redirect()->route('clients.index');
    }

    public function mount($id): void
    {
        $this->client = Client::findOrFail($id);
    }

    public function render(): View
    {
        if ($this->client->user_id !== auth()->id()) {
            return view('livewire.clients-index');
        }

        return view('livewire.add-client-phone');
    }
}
