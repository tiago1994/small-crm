<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($vehicles as $loop => $vehicle)
        <div class="col-span-3 md:col-span-1 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg {{ $vehicle->history && $vehicle->history->stop == null?'bg-gray-50':'' }}">
            <div class="flex">
                <div class="flex-1 flex">
                    @if($vehicle->history && $vehicle->history->stop == null)
                    <div wire:click="stopVehicle({{$vehicle->id}})"><i class="la la-pause text-xl cursor-pointer"></i></div>
                    @else
                    <div wire:click="play({{$vehicle->id}})"><i class="la la-play text-xl cursor-pointer"></i></div>
                    @endif
                </div>
                @role('Admin')
                <div class="justify-end flex-1 flex">
                    <div><a href="{{route('vehicles-history', $vehicle->id)}}"><i class="la la-bars text-xl cursor-pointer"></i></a></div>
                    <div wire:key="{{ $loop->index }}" wire:click="edit({{$vehicle->id}})"><i class="la la-pencil text-xl cursor-pointer ml-1"></i></div>
                    <div wire:click="toggleDeleteModal({{$vehicle->id}})"><i class="la la-trash text-xl cursor-pointer ml-1"></i></div>
                </div>
                @endrole
            </div>
            <div class="text-2xl font-semibold mt-2">{{ $vehicle->name }}</div>
            <div class="text-md font-semibold text-gray-400">{{ $vehicle->code }}</div>
            @if($vehicle->history && $vehicle->history->stop == null)
                <div class="text-md font-semibold text-gray-400">{{ $vehicle->history->user->name }}</div>
            @endif
        </div>
        @endforeach

        @if($openDeleteModal)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Deletar Ve??culo</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Deletando este ve??culo voc?? ira perder todo o hist??rico de uso do mesmo.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="delete()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Deletar
                        </button>
                        <button type="button" wire:click="toggleDeleteModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if($modalConfirm)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-5 pt-5 pb-4">
                        <div>
                            <div class="mt-3 text-center sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Utilizar Ve??culo</h3>
                                <hr class="mt-2">
                                <div class="w-full mt-3">
                                    <label class="font-bold text-sm">Usu??rio <span class="text-red-600">*</span></label>
                                    <select class="w-full border border-gray-200 rounded shadow-sm" wire:model="user_selected">
                                        <option>Selecionar usu??rio...</option>
                                        @foreach($users as $user)
                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                        @endforeach
                                    </select>
                                    @error('user_selected') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full mt-3">
                                    <label class="font-bold text-sm">Senha <span class="text-red-600">*</span></label>
                                    <input type="password" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="password" placeholder="Digite a sua senha..." />
                                    @error('password') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="checkPassword()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Utilizar
                        </button>
                        <button type="button" wire:click="toggleUseVehicle()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif

        @role('Admin')
        <div class="fixed right-5 bottom-5">
            <div class="bg-white h-10 w-10 flex items-center justify-center shadow-xl rounded-full cursor-pointer" wire:click="toggleAddModal()">
                <i class="la la-plus"></i>
            </div>
        </div>
        @endrole
        @if($openModal)
        <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-5 pt-5 pb-4">
                        <div>
                            <div class="mt-3 text-center sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Criar/Editar Ve??culo</h3>
                                <hr class="mt-2">
                                <div class="w-full mt-3">
                                    <label class="font-bold text-sm">Nome do ve??culo <span class="text-red-600">*</span></label>
                                    <input type="text" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="vehicle.name" placeholder="Digite o nome do ve??culo..." />
                                    @error('vehicle.name') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full mt-3">
                                    <label class="font-bold text-sm">Placa do ve??culo <span class="text-red-600">*</span></label>
                                    <input type="text" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="vehicle.code" placeholder="Digite a placa do ve??culo..." />
                                    @error('vehicle.code') <span class="text-red-500">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button type="button" wire:click="save()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:ml-3 sm:w-auto sm:text-sm">
                            Salvar
                        </button>
                        <button type="button" wire:click="toggleAddModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                            Cancelar
                        </button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>