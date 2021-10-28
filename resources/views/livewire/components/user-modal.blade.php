<div class="{{!$open?'hidden':''}}">
    <div class="fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-5 pt-5 pb-4">
                    <div>
                        <div class="mt-3 text-center sm:text-left">
                            <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Criar/Editar Usuário</h3>
                            <hr class="mt-2">
                            <div class="w-full mt-3">
                                <label class="font-bold text-sm">Nome <span class="text-red-600">*</span></label>
                                <input type="text" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="user.name" placeholder="Digite o nome..." required />
                                @error('user.name') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full mt-3">
                                <label class="font-bold text-sm">Email <span class="text-red-600">*</span></label>
                                <input type="email" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="user.email" placeholder="Digite o email..." required />
                                @error('user.email') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full mt-3">
                                <label class="font-bold text-sm">Tipo <span class="text-red-600">*</span></label>
                                <select class="w-full border border-gray-200 rounded shadow-sm" wire:model="role_selected" required>
                                    <option>Selecionar...</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                                @error('role_selected') <span class="text-red-500">{{ $message }}</span> @enderror
                            </div>
                            <div class="w-full mt-3">
                                <label class="font-bold text-sm">Senha <span class="text-red-600">*</span></label>
                                <input type="password" class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="user_password" placeholder="Digite a senha..." />
                                @error('user_password') <span class="text-red-500">{{ $message }}</span> @enderror
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