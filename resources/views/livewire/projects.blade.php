<div>
    <div class="grid grid-cols-3 gap-4">
        <div class="col-span-3">
            <table class="w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden mb-2">
                <thead class="bg-gray-50">
                    <tr class="text-gray-600 text-left">
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Etapa
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Preço
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Responsável
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Cliente
                        </th>
                        <th class="font-semibold text-sm uppercase px-6 py-4">
                            Criado em
                        </th>
                        <th class="text-center font-semibold text-sm uppercase px-6 py-4">
                            Opções
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($projects as $project)
                    <tr>
                        <td class="px-6 py-4">{{ $project->step->name }}</td>
                        <td class="px-6 py-4">R$ {{ number_format($project->value, 2, ',', '.') }}</td>
                        <td class="px-6 py-4">{{ $project->user->name }}</td>
                        <td class="px-6 py-4">{{ $project->client->name }}</td>
                        <td class="px-6 py-4">{{ \Carbon\Carbon::parse($project->created_at)->format('d/m/Y H:i:s')}}</td>
                        <td class="px-6 py-4 text-center w-32">
                            <i class="la la-pencil cursor-pointer" wire:click="toggleAddModal({{$project->id}})"></i>
                            <i class="la la-trash cursor-pointer ml-1" wire:click="toggleDeleteModal({{$project->id}})"></i>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{$projects->links()}}
        </div>

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
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">Deletar Projeto</h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        Deletando este projeto você ira perder todo o histórico do mesmo.
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
    </div>
    @livewire('components.lead-modal', ['add' => false])
</div>