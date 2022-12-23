<div class="flex flex-col items-center justify-center p-5 text-gray-700 text-xl font-medium">
    <div class="flex justify-center">
        <div class="flex flex-col items-center space-y-2">
            <img src="{{ $user->profile_photo_url }}" class="ring-2 ring-btncolor ring-offset-2 rounded-full">
            <span
                class="text-3xl font-bold transition ease-in-out duration-200 hover:text-btncolor-hover hover:cursor-pointer"
                wire:click="userProfile">
                {{ $user->name }}
            </span>
            <span class="text-xl font-semibold leading-normal">
                Total posts: {{ $user->posts_count }}
            </span>
            <span class="text-xl font-semibold leading-normal">
                Total likes: {{ $user->totalLikes()->count() }}
            </span>
        </div>
    </div>
</div>
