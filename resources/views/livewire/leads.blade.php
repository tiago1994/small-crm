<div>
    <div class="flex gap-2 overflow-x-auto">
        @foreach($steps as $step)
        <div class="w-80 bg-white p-2 h-full-leads flex flex-col border-b border-gray-200 shadow-sm sm:rounded-lg">
            <div class="mb-1 font-bold">{{$step->name}}</div>
            <div class="bg-gray-100 h-full p-2 border-b border-gray-200 shadow-sm sm:rounded-lg overflow-y-auto">

                @foreach($step->projects as $project)
                <div class="bg-white p-2 border-b border-gray-200 shadow-sm sm:rounded-lg cursor-pointer mb-2" wire:click="openModal({{$project->id}})">
                    <div class="font-bold text-sm">{{ $project->client->name }}</div>
                    <div class="text-xs">{{ $project->title }}</div>
                    <div class="flex justify-end mt-1">
                        <img src="{{ $project->user->profile_photo_url }}" alt="{{ $project->user->name }}" title="{{ $project->user->name }}" class="rounded-full h-5 w-5 object-cover">
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @livewire('components.lead-modal')
</div>