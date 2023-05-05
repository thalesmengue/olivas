<div class="space-y-10 divide-y divide-gray-900/10 p-8">
    <div class="grid grid-cols-1 gap-x-8 gap-y-8 pt-10 md:grid-cols-3">
        <div class="px-4 sm:px-0">
            <div class="mt-8">
                <div>
                    <a href="{{ route('user.change-password', auth()->id()) }}"
                        class="mt-6 rounded-md border border-gray-300 bg-blue-500 py-2 px-4 text-sm font-medium text-white
                             shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Trocar Senha
                    </a>
                </div>
                <div>
                    <button type="submit" wire:click="deleteAccount"
                            class="mt-6 rounded-md border border-gray-300 bg-red-500 py-2 px-4 text-sm font-medium text-white
                             shadow-sm hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Deletar Conta
                    </button>
                </div>
            </div>
        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <h2 class="text-base font-semibold leading-7 text-gray-900">Informações</h2>
            <p class="mt-1 text-sm leading-6 text-gray-600">Aqui você pode mudar suas informações</p>
            <div class="bg-white py-8 px-4 mt-8 shadow sm:rounded-lg sm:px-10">
                <form class="space-y-6" wire:submit.prevent="update">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nome</label>
                        <div class="mt-1">
                            <input id="name" type="text" wire:model="name"
                                   class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2
                                       placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none
                                       focus:ring-indigo-500 sm:text-sm"/>
                        </div>
                        <div>
                            @error('current_password')
                            <div class="text-center text-xs text-red-600 mt-2">
                                <span> {{ $message }} </span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <div class="mt-1">
                            <input id="email" type="email" wire:model="email"
                                   class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2
                                   placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none
                                   focus:ring-indigo-500 sm:text-sm"/>
                        </div>
                        <div>
                            @error('password')
                            <div class="text-center text-xs text-red-600 mt-2">
                                <span> {{ $message }} </span>
                            </div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <div class="flex justify-end gap-5">
                            <button type="button" onclick="window.location='{{ url()->previous() }}'"
                                    class="rounded-md border border-gray-300 bg-white py-2 px-4 text-sm font-medium text-gray-700
                             shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Voltar
                            </button>
                            <button type="submit"
                                    class="rounded-md border border-gray-300 bg-indigo-600 py-2 px-4 text-sm font-medium text-white
                             shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
