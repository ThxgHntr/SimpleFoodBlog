<div>
    <div class="flex items-center justify-center w-full">
        <label for="picture_zone"
            class="flex flex-col items-center justify-center w-full p-2 h-fit
         border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-white 
         dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600
          dark:hover:border-gray-500 dark:hover:bg-gray-600">
            @if ($pictures)
                <div class="flex flex-wrap justify-center mx-auto">
                    @foreach ($pictures as $index => $picture)
                        <div class="z-0 relative">
                            <img class="w-full h-24" src="{{ $picture->temporaryUrl() }}">
                            <button wire:click.prevent="remove({{ $index }})"
                                class="absolute px-1 py-0 top-0 right-0 bg-transparent border-none text-black hover:text-gray-500">
                                x
                            </button>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center">
                    <svg class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                        </path>
                    </svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                            upload preview picture</span>
                        or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF</p>
                </div>
            @endif
            <input wire:model.defer="pictures" id="picture_zone" type="file" name="pictures" class="hidden" multiple />
            <x-jet-input-error for="picture_zone" class="mt-2" />
        </label>
    </div>
    @if ($oldPictures)
        <div class="flex flex-wrap justify-center mx-auto">
            @foreach ($oldPictures as $index => $oldPicture)
                <div class="z-0 relative">
                    <img class="w-full h-24" src="{{ url('/', $oldPicture) }}">
                    <button wire:click.prevent="removeOld({{ $index }})"
                        class="absolute px-1 py-0 top-0 right-0 bg-transparent border-none text-gray-700 hover:text-gray-300">
                        x
                    </button>
                </div>
            @endforeach
        </div>
    @endif
</div>
