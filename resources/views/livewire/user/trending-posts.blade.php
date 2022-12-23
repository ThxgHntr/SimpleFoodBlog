<div>
    <figure class="flex h-fit">
        @if ($post->getPreviewPicture())
            <img src="{{ $post->getPreviewPicture() }}" class="object-cover w-20 h-30 hover:cursor-pointer" wire:click="readMore">
        @endif
        <figcaption class="flex flex-col justify-between font-bold text-xl p-3">
            <div wire:click="readMore" class="hover:text-btncolor-hover hover:cursor-pointer order-first transition ease-in-out duration-200">
                {{ subStr($post->title, 0, 30) }}
            </div>
            
            <div class="flex flex-wrap items-center order-last">
                <div
                    class="border-r text-gray-800 text-xs font-medium inline-flex items-center px-2 py-0.5 rounded mr-2 mb-2 dark:bg-gray-700 dark:text-gray-300">
                    <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $post->getDateUpload() }}
                </div>
                @foreach ($tags as $tag)
                    @livewire('component.tag-button', ['tag' => $tag], key($tag->id))
                @endforeach
            </div>
        </figcaption>
    </figure>
</div>
