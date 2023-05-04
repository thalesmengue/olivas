@php
    use App\Enum\LegalRegime;
@endphp
<div class="flex items-center justify-center mt-24">
    <div class="px-8 py-6 mx-4 mt-4 text-left bg-white shadow-lg md:w-1/3 lg:w-1/3 sm:w-1/3">
        <h3 class="text-2xl font-bold text-center">Update a Client</h3>
        <form wire:submit.prevent="update">
            @csrf
            <div class="mt-4">
                <div>
                    <label class="block" for="name">Name</label>
                    <input type="text" placeholder="name" name="name" id="name" wire:model="name" value="{{ $client->name }}"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    @error('name')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block" for="email">Email</label>
                    <input type="text" placeholder="email" name="email" id="email"
                           wire:model="email"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    @error('email')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block" for="phone">Phone</label>
                    <input type="text" placeholder="phone" name="phone" id="phone"
                           wire:model="phone"
                           class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                </div>
                <div>
                    @error('phone')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="block" for="legal_regime">Legal Regime</label>
                    <select name="legal_regime" id="legal_regime" wire:model="legal_regime"
                            class="w-full px-4 py-2 mt-2 border rounded-md focus:outline-none focus:ring-1 focus:ring-blue-600">
                        <option selected>Escolha um regime legal</option>
                        <option value="{{ LegalRegime::pj->value }}">Pessoa Jurídica</option>
                        <option value="{{ LegalRegime::pf->value }}">Pessoa Física</option>
                    </select>
                </div>
                <div>
                    @error('legal_regime')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="mt-4">
                    <label class="mb-2 inline-block" for="image">Image</label>
                    <input type="file" placeholder="image" id="image" wire:model="image"
                           class="relative m-0 block w-full min-w-0 flex-auto cursor-pointer rounded border
                                   border-solid border-neutral-300 bg-white bg-clip-padding px-3 py-1.5 text-base
                                   font-normal text-neutral-700 outline-none transition duration-300 ease-in-out
                                   file:-mx-3 file:-my-1.5 file:cursor-pointer file:overflow-hidden file:rounded-none
                                   file:border-0 file:border-solid file:border-inherit file:bg-neutral-100 file:px-3
                                   file:py-1.5 file:text-neutral-700 file:transition file:duration-150 file:ease-in-out
                                   file:[margin-inline-end:0.75rem] file:[border-inline-end-width:1px] hover:file:bg-neutral-200
                                    focus:border-primary focus:bg-white focus:text-neutral-700 focus:shadow-[0_0_0_1px]
                                    focus:shadow-primary focus:outline-none">
                </div>
                <div>
                    @error('image')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div class="flex justify-center items-center">
                    <button class="px-6 py-2 mt-4 text-white bg-indigo-600 rounded-lg hover:bg-indigo-900">
                        register
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
