<div class="p-4 rounded-2xl bg-gray-100 shadow-md">
    <div class="not-prose flex justify-between">
        <div href="#" class="not-prose flex items-center order-first">
            <img src="{{ $comment->user->profile_photo_url }}" class="rounded-full w-8 h-8 mr-2">
            <h4>{{ $comment->user->name }}</h4>
        </div>
        <div class="flex justify-end">
            <livewire:post.comment-dropdown :actions="$comment->user->id == Auth::user()->id ? ['edit', 'delete'] : ['report']" :comment="$comment" :wire:key="'comment-dropdown'" />
            @if ($comment->user_id == Auth::user()->id)
                <!-- Post Delete Confirmation Modal -->
                <x-jet-dialog-modal wire:model="confirmingCommentDeletion">
                    <x-slot name="title">
                        {{ __('Delete Comment') }}
                    </x-slot>

                    <x-slot name="content">
                        {{ __('Are you sure you want to delete this comment?') }}
                    </x-slot>

                    <x-slot name="footer">
                        <x-jet-secondary-button wire:click="$toggle('confirmingCommentDeletion')"
                            wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-jet-secondary-button>

                        <x-jet-danger-button class="ml-3" wire:click="deleteComment" wire:loading.attr="disabled">
                            {{ __('Yes, do it') }}
                        </x-jet-danger-button>
                    </x-slot>
                </x-jet-dialog-modal>
            @endif
        </div>
    </div>
    <div class="relative">
        <p class="p-2">{{ $comment->comment }}</p>
        <span class="text-xs">{{ $comment->getDateTimeUpload() }}</span>
        <x-jet-secondary-button class="absolute bottom-0 right-0">reply</x-jet-secondary-button>
    </div>
</div>
