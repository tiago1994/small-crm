<div>
    <div class="absolute right-5 bottom-5">
        <div class="bg-white h-10 w-10 flex items-center justify-center shadow-xl rounded-full cursor-pointer" wire:click="openModal()">
            <i class="la la-plus"></i>
        </div>
    </div>
    <div class="{{!$open?'hidden':''}}">
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all my-8 align-middle max-w-5xl w-full">
                    <div class="bg-white px-5 pt-5 pb-4">
                        <div>
                            <div class="mt-3 text-center sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Lead</h3>
                                <hr class="mt-2">
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-4 mt-3">
                                        <select class="w-full border border-gray-200 rounded shadow-sm">
                                            <option value="">Selecionar etapa...</option>
                                            @foreach($steps as $step)
                                                <option value="{{ $step->id }}">{{ $step->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.step_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <select class="w-full border border-gray-200 rounded shadow-sm">
                                            <option value="">Selecionar responsavel...</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.client_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <select class="w-full border border-gray-200 rounded shadow-sm">
                                            <option value="">Selecionar cliente...</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.user_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-3 mt-3">
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o cep do projeto..." />
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-6 mt-3">
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o endereço do projeto..." />
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-3 mt-3">
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o número do projeto..." />
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-4 mt-3">
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o bairro do projeto..." />
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <select class="w-full border border-gray-200 rounded shadow-sm">
                                            <option value="">Selecionar a cidade...</option>
                                            <option value="1">Cidade 1</option>
                                            <option value="2">Cidade 2</option>
                                            <option value="3">Cidade 3</option>
                                            <option value="4">Cidade 4</option>
                                        </select>
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <select class="w-full border border-gray-200 rounded shadow-sm">
                                            <option value="">Selecionar o estado...</option>
                                            <option value="1">Estado 1</option>
                                            <option value="2">Estado 2</option>
                                            <option value="3">Estado 3</option>
                                            <option value="4">Estado 4</option>
                                        </select>
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>  
                                <div class="w-full mt-3">
                                    <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o título do projeto..." />
                                    @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full mt-3">
                                    <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os detalhes do projeto..." rows="4"></textarea>
                                    @error('project.description') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="save()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Salvar
                        </button>
                        <button type="button" wire:click="closeModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>