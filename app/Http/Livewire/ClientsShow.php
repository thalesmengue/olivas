<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class ClientsShow extends Component
{
    public Client|null $client;

    public function mount($id): void
    {
        $this->client = Client::query()->findOrFail($id);
    }

    public function delete(): RedirectResponse|Redirector
    {
        $this->client->delete();

        File::delete(public_path('storage/' . $this->client->image));

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.clients-show');
    }
}
