<div class="flex items-center mb-2 hover:cursor-pointer" wire:click="userProfile">
    <img src="{{ $user->profile_photo_url }}" class="rounded-full h-6 w-6 mr-2">
    <div class="font-semibold transition ease-in-out duration-200 hover:text-btncolor-hover">{{ $user->name }}</div>
</div>