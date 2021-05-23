<div>
    <div class="gap-4">
        <div class="flex mb-3">
            <div class="text-2xl leading-6 font-semibold text-gray-900 flex-1">{{$vehicle->name}}</div>
            <a href="{{route('vehicles')}}" class="text-2xl leading-6 font-semibold text-gray-900">
                <i class="la la-angle-left"></i>
            </a>
        </div>
        <table class="w-full whitespace-nowrap rounded-lg bg-white divide-y divide-gray-300 overflow-hidden mb-2">
            <thead class="bg-gray-50">
                <tr class="text-gray-600 text-left">
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Instalador
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Saída
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Entrada
                    </th>
                    <th class="font-semibold text-sm uppercase px-6 py-4">
                        Duração
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($histories as $history)
                    <tr>
                        <td class="px-6 py-4">{{$history->user->name}}</td>
                        <td class="px-6 py-4">{{\Carbon\Carbon::parse($history->start)->format('d/m/Y H:i:s')}}</td>
                        <td class="px-6 py-4">{{$history->stop?\Carbon\Carbon::parse($history->stop)->format('d/m/Y H:i:s'):'-'}}</td>
                        <td class="px-6 py-4">{{$history->stop?gmdate('H:i:s', \Carbon\Carbon::parse($history->start)->diffInSeconds($history->stop)):'-'}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$histories->links()}}
    </div>
</div>