<div>
    <style>
    </style>

    <div class="flex gap-2 overflow-x-auto">
        @for($i = 0; $i < 4; $i++)
            <div class="w-80 bg-white p-2 h-96 flex flex-col border-b border-gray-200 shadow-sm sm:rounded-lg">
                <div class="mb-1 font-bold">Etapa 1</div>
                <div class="bg-gray-100 h-full p-2 border-b border-gray-200 shadow-sm sm:rounded-lg">

                    <div class="bg-white p-2 border-b border-gray-200 shadow-sm sm:rounded-lg cursor-pointer">
                        <div class="font-bold text-sm">Tiago Matos</div>
                        <div class="text-xs">Orçamento para porta de vidro 5/4 utilizando o vidro x.</div>
                        <div class="flex justify-end mt-1">
                            <img src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}" title="{{ auth()->user()->name }}" class="rounded-full h-5 w-5 object-cover">
                        </div>
                    </div>

                </div>
            </div>
        @endfor
    </div>

    @livewire('components.lead-modal')
</div>
