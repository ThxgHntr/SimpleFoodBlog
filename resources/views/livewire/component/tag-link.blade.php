<div wire:click="searchPost"
    class="flex justify-between text-gray-700 text-xl p-2 font-medium trannsition ease-int-out duration-200 hover:text-btncolor-hover hover:cursor-pointer">
    <div class="order-first">
        {{ $tag->name }}
    </div>
    <div class="order-last">
        ({{ $tag->posts_count }})
    </div>
</div>
