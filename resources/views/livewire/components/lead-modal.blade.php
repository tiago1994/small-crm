<div>
    @if($add)
        <div class="fixed right-5 bottom-5">
            <div class="bg-white h-10 w-10 flex items-center justify-center shadow-xl rounded-full cursor-pointer" wire:click="openLeadModal()">
                <i class="la la-plus"></i>
            </div>
        </div>
    @endif
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
                                        <label class="font-bold text-sm">Etapa <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="project.step_id">
                                            <option value="">Selecionar etapa...</option>
                                            @foreach($steps as $step)
                                                <option value="{{ $step->id }}">{{ $step->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.step_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Respons??vel <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="project.client_id">
                                            <option value="">Selecionar responsavel...</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.client_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Cliente <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="project.user_id">
                                            <option value="">Selecionar cliente...</option>
                                            @foreach($clients as $client)
                                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('project.user_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Cep <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o cep do projeto..." wire:model="project.cep" />
                                        @error('project.cep') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Estado <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model="state_id">
                                            <option value="">Selecionar o estado...</option>
                                            @foreach($states as $state)
                                                <option value="{{ $state['id'] }}">{{ $state['name'] }}</option>    
                                            @endforeach
                                        </select>
                                        @error('state_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Cidade <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model="city_id">
                                            <option value="">Selecionar a cidade...</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city['id'] }}">{{ $city['name'] }}</option>    
                                            @endforeach
                                        </select>
                                        @error('city_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-6 mt-3">
                                        <label class="font-bold text-sm">Endere??o <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o endere??o do projeto..." wire:model.defer="project.address" />
                                        @error('project.address') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-3 mt-3">
                                        <label class="font-bold text-sm">N??mero <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o n??mero do projeto..." wire:model.defer="project.number" />
                                        @error('project.number') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-3 mt-3">
                                        <label class="font-bold text-sm">Bairro <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o bairro do projeto..." wire:model.defer="project.neighborhood" />
                                        @error('project.neighborhood') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>  
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">T??tulo <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o t??tulo do projeto..." wire:model.defer="project.title" />
                                        @error('project.title') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Valor <span class="text-red-600">*</span></label>
                                        <input type="text" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite o valor do projeto..." onKeyUp="moeda(this);" wire:model.defer="project.value" />
                                        @error('project.value') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-span-4 mt-3">
                                        <label class="font-bold text-sm">Como nos encontrou? <span class="text-red-600">*</span></label>
                                        <select class="w-full border border-gray-200 rounded shadow-sm" wire:model.defer="find_us_id">
                                            <option value="">Selecionar...</option>
                                            @foreach($find_us as $type)
                                                <option value="{{ $type['id'] }}">{{ $type['name'] }}</option>    
                                            @endforeach
                                        </select>
                                        @error('find_us_id') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="w-full mt-3">
                                    <label class="font-bold text-sm">Arquivos</label>
                                    <input type="file" class="w-full border border-gray-200 p-2 rounded shadow-sm" wire:model.defer="files" multiple />
                                    @error('files') <span class="text-red-500">{{ $message }}</span> @enderror
                                    @if(!empty($project->files))
                                        <div class="flex mt-2">
                                            @foreach($project->files as $file)
                                                <div class="relative">
                                                    <a href="{{asset('storage/leads/'.$file->file)}}" target="_blank">
                                                        <i class="la la-file-download la-3x"></i>
                                                    </a>
                                                    <div class="w-5 h-5 bg-red-600 absolute top-0 right-0 flex items-center justify-center cursor-pointer" wire:click="removeFile({{$file}})"><i class="la la-trash text-white text-sm"></i></div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                                <div class="grid grid-cols-12 gap-3">
                                    <div class="col-span-6 mt-3">
                                        <label class="font-bold text-sm">Detalhes <span class="text-red-600">*</span></label>
                                        <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os detalhes do projeto..." rows="4" wire:model.defer="project.description"></textarea>
                                        @error('project.description') <span class="text-red-500">{{ $message }}</span> @enderror
                                    </div>
                                    @if($add)
                                        <div class="col-span-6 mt-3">
                                            <label class="font-bold text-sm">Coment??rios ({{$project->step->name??'Etapa selecionada'}})</label>
                                            <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os coment??rios do projeto..." rows="4" wire:model.defer="project.comment_{{$project->step_id??'1'}}"></textarea>
                                            @error('project.description') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                    @endif
                                    
                                    @if(!$add)
                                        <div class="col-span-6 mt-3">
                                            <label class="font-bold text-sm">Coment??rios (Lead)</label>
                                            <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os coment??rios do projeto..." rows="4" wire:model.defer="project.comment_1"></textarea>
                                            @error('project.comment_1') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 mt-3">
                                            <label class="font-bold text-sm">Coment??rios (Proposta)</label>
                                            <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os coment??rios do projeto..." rows="4" wire:model.defer="project.comment_2"></textarea>
                                            @error('project.comment_2') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 mt-3">
                                            <label class="font-bold text-sm">Coment??rios (Primeiro Contato)</label>
                                            <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os coment??rios do projeto..." rows="4" wire:model.defer="project.comment_3"></textarea>
                                            @error('project.comment_3') <span class="text-red-500">{{ $message }}</span> @enderror
                                        </div>
                                        <div class="col-span-6 mt-3">
                                            <label class="font-bold text-sm">Coment??rios (Segundo Contato)</label>
                                            <textarea class="w-full border border-gray-200 rounded shadow-sm" placeholder="Digite os coment??rios do projeto..." rows="4" wire:model.defer="project.comment_4"></textarea>
                                            @error('project.comment_4') <span class="text-red-500">{{ $message }}</span> @enderror
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
</div>