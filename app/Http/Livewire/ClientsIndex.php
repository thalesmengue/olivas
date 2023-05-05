<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Phone;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\Redirector;

class ClientsIndex extends Component
{
    public Collection|null $clients;
    public Model|null $phone;

    public function mount(): void
    {
        $this->clients = Client::all()
            ->where('user_id', auth()->user()->id);
    }

    public function delete($id): RedirectResponse|Redirector
    {
        $client = Client::findOrFail($id);
        $client->delete();

        File::delete(public_path('storage/' . $client->image));

        return redirect()->route('clients.index');
    }

    public function render(): View
    {
        return view('livewire.clients-index');
    }
}
