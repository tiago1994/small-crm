<div class="{{!$open?'hidden':''}}">
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-5 pt-5 pb-4">
                    <div>
                        <div class="mt-3 text-center sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Criar/Editar Cotação</h3>
                            <hr class="mt-2">
                            <div class="w-full mt-3">
                                <input type="text" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="offer.title" placeholder="Digite o título..." />
                                @error('offer.title') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full mt-3">
                                <input type="file" class="w-full border border-gray-200 rounded p-2 shadow-sm" wire:model="file"/>
                                @error('file') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full mt-3">
                                <select class="w-full border border-gray-200 rounded shadow-sm" wire:model="provider_select">
                                    <option value="">Selecionar fornecedor...</option>
                                    @foreach($providers as $p)
                                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                                    @endforeach
                                </select>
                                @error('providers_selected') <span class="text-red-500">{{ $message }}</span> @enderror
                                
                                @if(count($providers_selected) > 0)
                                    <div class="flex gap-2 flex-wrap mt-2">
                                        @foreach ($providers_selected as $provider_selected)
                                            <div class="cursor-pointer bg-gray-200 px-2 border-gray-500 rounded shadow-sm" wire:click="removeSelectedProvider({{$provider_selected['id']}})">{{$provider_selected['name']}}</div>
                                        @endforeach
                                    </div>
                                @endif
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