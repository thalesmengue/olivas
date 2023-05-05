@php
    use App\Enum\LegalRegime;
@endphp
<div class="flex items-center justify-center mt-24">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Adicionar novo telefone para cliente</h3>
        <form wire:submit.prevent="addPhone">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="name">Telefone</label>
                    <input type="text" placeholder="telefone" id="phone" wire:model="phone"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    @error('phone')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="flex justify-center items-center">
                    <button class="px-6 py-2 mt-4 text-white bg-indigo-600 rounded-lg hover:bg-indigo-900">
                        Salvar
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
