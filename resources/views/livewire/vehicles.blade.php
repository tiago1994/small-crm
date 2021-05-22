<div>
    <div class="grid grid-cols-3 gap-4">
        @foreach ($vehicles as $vehicle)    
            <div class="col-span-1 p-6 bg-white border-b border-gray-200 shadow-sm sm:rounded-lg">    
                <div class="flex">
                    <div class="flex-1">
                        <button><i class="la la-play text-xl"></i></button>
                        <button><i class="la la-pause text-xl"></i></button>
                    </div>
                    <div class="text-right flex-1">
                        <button><i class="la la-edit text-xl"></i></button>
                        <button><i class="la la-trash text-xl"></i></button>
                    </div>
                </div>
                <div class="text-2xl font-semibold mt-2">{{ $vehicle->name }}</div>
            </div>
        @endforeach
    </div>
</div>
