@section('title', 'Tags')
<div class="w-full min-h-screen">
    <div class="px-20 space-y-4">
        <h1 class="font-bold inline-flex border-b-2 p-2 border-b-btncolor-hover text-4xl">
            All tags
        </h1>
        <div class="flex justify-center w-full">
            <div class="relative w-1/2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="absolute text-slate-400 w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <x-jet-input class="w-full pl-10 rounded-2xl" type="text" wire:model='search'
                    placeholder="Enter tag" />
            </div>
        </div>
        <div class="flex flex-wrap justify-between">
            @foreach ($tags as $tag)
                <div class="bg-white shadow-md rounded-lg mb-3">
                    <livewire:component.tag-card :wire:key="'tag-'.$tag->id" :tag="$tag" />
                </div>
            @endforeach
            {{ $tags->links() }}
        </div>
    </div>
</div>
