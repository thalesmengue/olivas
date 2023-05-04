<section class="pt-16 bg-blueGray-50">
    <div class="w-full lg:w-4/12 px-4 mx-auto">
        <div class="relative flex flex-col min-w-0 break-words bg-white w-full mb-6 shadow-xl rounded-lg mt-16">
            <div class="px-6">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <div class="flex justify-center py-4 lg:pt-4 pt-8">
                            <div class="mr-4 p-3">
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <p class="leading-normal mb-2 text-blueGray-400 uppercase text-center font-extrabold">
                            Client Details
                        </p>
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-10 flex gap-1.5">
                        <div>
                            <p class="font-bold">Name: </p>
                        </div>
                        <div>
                            <p class="mr-2">{{$client->name}}</p>
                        </div>
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-6 flex gap-1.5">
                        <div>
                            <p class="font-bold">Email: </p>
                        </div>
                        <div>
                            <p class="mr-2">{{$client->email}}</p>
                        </div>
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-6 flex gap-1.5">
                        <div>
                            <p class="font-bold">Phone: </p>
                        </div>
                        <div>
                            <p class="mr-2">{{$client->phone}}</p>
                        </div>
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-6 flex gap-1.5">
                        <div>
                            <p class="font-bold">Legal Regime: </p>
                        </div>
                        <div>
                            <p class="mr-2">{{$client->legal_regime}}</p>
                        </div>
                    </div>
                    <div class="mb-2 text-blueGray-600 mt-6 flex gap-1.5">
                        <div>
                            <p class="font-bold">Image: </p>
                        </div>
                        <div>
                            <img src="{{asset('storage/' . $client->image)}}" class="mr-2 h-24">
                        </div>
                    </div>
                </div>
                <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                    <div class="flex flex-wrap justify-center">
                        <div>
                            <button wire:click="delete"
                                type="submit" class="text-red-600 hover:text-red-900 ml-6">Delete</button>
                        </div>
                        <div class="flex flex-row ml-12">
                            <a href="{{route('clients.update', $client->id)}}"
                                class="text-blue-600 hover:text-blue-900">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
