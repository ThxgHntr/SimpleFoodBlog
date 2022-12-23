<form>
    @csrf
    <div class="not-prose flex flex-row">
        <img src="{{ Auth::user()->profile_photo_url }}" class="rounded-full w-11 h-11">
        <x-textarea class="rounded-2xl mx-3 h-11" wire:model.defer='comment' id="comment" name="comment" rows="1"
            placeholder="Comment..." required />
        <button
            class="disabled:opacity-25 px-2.5 rounded-full max-h-11 bg-transparent transition hover:bg-gray-100 active:bg-gray-300"
            wire:click.prevent="comment" wire:loading.attr="disabled">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="-2 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6 stroke-btncolor">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5" />
            </svg>
        </button>
    </div>
    <x-jet-input-error for="comment" class="mt-2" />
</form>
