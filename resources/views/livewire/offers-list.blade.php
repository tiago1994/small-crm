<div>
    <div class="gap-4">
        <div class="flex mb-3">
            <div class="text-2xl leading-6 font-semibold text-gray-900 flex-1">
                <a href="{{route('offers')}}" class="text-2xl leading-6 font-semibold text-gray-900">
                    <i class="la la-angle-left"></i>
                </a>
                {{$offer->title}}
            </div>
            <div>
                <a href="{{asset('storage/offers/'.$offer->file)}}" target="_blank"><i class="la la-download text-xl"></i></a>
            </div>
        </div>

        <div class="grid grid-cols-12 gap-3">
            @foreach($offer->offers as $offers)
                <div class="col-span-4 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg {{!$offers->description && !$offers->value?'opacity-card':''}}">
                    <div class="text-xl font-bold">{{$offers->provider->company}}</div>
                    <div>{{$offers->description}}</div>
                    <div class="text-lg text-right font-bold">R${{number_format($offers->value, 2, ',', '.')}}</div>
                </div>
            @endforeach
        </div>
    </div>
</div>