<div class="flex min-h-full flex-col justify-center mt-32 py-12 sm:px-6 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-md">
        <h2 class="mt-6 text-center text-3xl font-bold tracking-tight text-gray-900">Entre na sua conta</h2>
    </div>
    <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
        <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
            <form class="space-y-6" wire:submit.prevent="login">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <div class="mt-1">
                        <input id="email" type="email" wire:model="email"
                               class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2
                                   placeholder-gray-400 shadow-sm focus:border-indigo-500 focus:outline-none
                                   focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Senha</label>
                    <div class="mt-1">
                        <input id="password" wire:model="password" type="password"
                               class="block w-full appearance-none rounded-md border border-gray-300 px-3 py-2 placeholder-gray-400
                                    shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-indigo-500 sm:text-sm"/>
                    </div>
                </div>
                <div>
                    @error('email')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div>
                    @error('password')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div>
                    @error('credentials')
                    <div class="text-center text-xs text-red-600 mt-2">
                        <span> {{ $message }} </span>
                    </div>
                    @enderror
                </div>
                <div>
                    <div class="text-sm">
                        <a href="{{ route('user.register') }}"
                           class="font-medium text-indigo-600 hover:text-indigo-500">
                            Não tem uma conta?
                        </a>
                    </div>
                </div>
                <div>
                    <button type="submit" wire:click="login"
                            class="flex w-full justify-center rounded-md border border-transparent bg-indigo-600 py-2
                                px-4 text-sm font-medium text-white shadow-sm hover:bg-indigo-700 focus:outline-none
                                focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Entrar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
