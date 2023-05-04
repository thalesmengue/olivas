<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;
use Livewire\WithFileUploads;

class ClientsUpdate extends Component
{
    use WithFileUploads;

    public Client|null $client;
    public string $name;
    public string $email;
    public string $phone;
    public $image;
    public string $legal_regime;

    protected array $rules = [
        'name' => ['required', 'min:3', 'string'],
        'email' => ['required', 'min:3', 'email'],
        'phone' => ['required', 'min:3', 'string'],
        'image' => ['nullable', 'image'],
        'legal_regime' => ['required', 'string']
    ];

    public function mount($id): void
    {
        $this->client = Client::query()->findOrFail($id);
        $this->name = $this->client->name;
        $this->email = $this->client->email;
        $this->phone = $this->client->name;
        $this->legal_regime = $this->client->legal_regime;
    }

    public function update(): RedirectResponse|Redirector
    {
        $this->validate();

        if ($this->image !== null){
            File::delete(public_path('storage/' . $this->client->image));

            $this->client->update([
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'image' => $this->image->store('clients', 'public'),
                'legal_regime' => $this->legal_regime
            ]);
        }

        $this->client->update([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'legal_regime' => $this->legal_regime
        ]);

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.clients-update');
    }
}
