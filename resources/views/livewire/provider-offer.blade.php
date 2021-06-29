<div class="h-screen items-center flex flex-col justify-center">
    @if($offer_provider->description && $offer_provider->value)
        <div class="flex flex-col text-center">
            <div><i class="la la-check-circle text-green-500 la-4x"></i></div>
            <div class="text-2xl text-green-500 ">Obrigado!</div>
            <div>Cotação enviada com sucesso</div>
        </div>
    @else
        <svg class="w-16 h-16" viewBox="0 0 48 48" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M11.395 44.428C4.557 40.198 0 32.632 0 24 0 10.745 10.745 0 24 0a23.891 23.891 0 0113.997 4.502c-.2 17.907-11.097 33.245-26.602 39.926z" fill="#6875F5"></path>
            <path d="M14.134 45.885A23.914 23.914 0 0024 48c13.255 0 24-10.745 24-24 0-3.516-.756-6.856-2.115-9.866-4.659 15.143-16.608 27.092-31.75 31.751z" fill="#6875F5"></path>
        </svg>
        <div class="container mx-auto p-6 flex justify-center">
            <form class="max-w-full w-4/6" wire:submit.prevent="submit">
                <div class="text-2xl font-bold">
                    {{$offer_provider->offer->title}}
                    <a href="{{asset('storage/offers/'.$offer_provider->offer->file)}}" target="_blank">
                        <i class="la la-download"></i>
                    </a>
                </div>
                <div class="text-md font-bold">
                    {{$offer_provider->provider->company}} ({{$offer_provider->provider->name}})
                </div>
                <div class="">
                    <textarea wire:model.defer="offer_provider.description" placeholder="Detalhes da oferta..." rows="5" class="w-full border border-gray-200 rounded shadow-sm" required></textarea>
                </div>
                <div class="">
                    <input type="text" wire:model.defer="offer_provider.value" onKeyUp="moeda(this);" class="w-full border border-gray-200 rounded shadow-sm" placeholder="Valor..." required />
                </div>
                <div class="text-right mt-2">
                    <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none sm:w-auto sm:text-sm">Enviar</button>
                </div>
            </form>
        </div>
    @endif
</div>
