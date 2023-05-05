<?php

namespace App\Http\Livewire;

use App\Events\Registered;
use App\Models\Client;
use App\Models\Phone;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\Rule;
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


    protected function rules(): array
    {
        return [
            'name' => ['required', 'min:3', 'string'],
            'email' => ['required', 'min:3', 'email',
                Rule::unique('clients')
                    ->where('user_id', auth()->id())
                    ->where('email', $this->email)
            ],
            'phone' => ['required', 'digits:11', 'numeric'],
            'image' => ['required', 'image'],
            'legal_regime' => ['required', 'string']
        ];
    }

    public function create(): RedirectResponse|Redirector
    {
        $this->validate();

        $client = Client::create([
            'user_id' => auth()->id(),
            'name' => $this->name,
            'email' => $this->email,
            'image' => $this->image->store('clients', 'public'),
            'legal_regime' => $this->legal_regime
        ]);

        Phone::create([
            'phone' => $this->phone,
            'client_id' => $client->id
        ]);

        event(new Registered($client));

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.clients-create');
    }
}
