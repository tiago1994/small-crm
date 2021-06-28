<div>
    @if($offer_provider->description && $offer_provider->value)
        <div class="flex flex-col text-center min-h-screen justify-center">
            <div><i class="la la-check-circle text-green-500 la-4x"></i></div>
            <div class="text-2xl text-green-500 ">Obrigado!</div>
            <div>Cotação enviada com sucesso</div>
        </div>
    @else
        <div class="container mx-auto p-6">
            <form class="grid grid-cols-6 gap-1" wire:submit.prevent="submit">
                <div class="col-span-6 text-2xl font-bold">
                    {{$offer_provider->offer->title}}
                    <a href="{{asset('storage/offers/'.$offer_provider->offer->file)}}" target="_blank">
                        <i class="la la-download"></i>
                    </a>
                </div>
                <div class="col-span-6 text-md font-bold">
                    {{$offer_provider->provider->company}} ({{$offer_provider->provider->name}})
                </div>
                <div class="col-span-6">
                    <textarea wire:model.defer="offer_provider.description" placeholder="Detalhes da oferta..." rows="5" class="w-full border border-gray-200 rounded shadow-sm" required></textarea>
                </div>
                <div class="col-span-2">
                    <input type="text" wire:model.defer="offer_provider.value" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Valor..." required />
                </div>
                <div class="col-span-6 text-right">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:w-auto sm:text-sm">Enviar</button>
                </div>
            </form>
        </div>
    @endif
</div>
