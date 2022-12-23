<div wire:click="searchPost"
    class="flex flex-col items-center justify-center p-5 text-gray-700 text-xl font-medium trannsition ease-int-out duration-200 hover:bg-btncolor-hover hover:text-white hover:cursor-pointer">
    <div>
        {{ $tag->name }}
    </div>
    <div>
        ({{ $tag->posts_count }})
    </div>
</div>
