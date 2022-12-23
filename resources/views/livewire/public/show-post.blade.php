@section('title', 'Post')
<article
    class="prose-xl prose-headings:font-bold min-h-screen lg:w-4/5 sm:min-w-screen mx-auto pb-4 bg-white shadow-xl overflow-hidden rounded-lg">
    @if ($post->getPreviewPicture())
        <div class="not-prose pb-4">
            <livewire:component.carousel :post="$post" />
        </div>
    @endif
    <div class="flex flex-col px-8">
        <h1 class="pt-4">
            {{ $post->title }}
        </h1>
        <div class="flex flex-wrap items-center mb-8 divide-x">
            <div
                class="text-gray-800 text-xs font-medium inline-flex items-center pl-1 pr-3 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                <svg aria-hidden="true" class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ $post->getDateUpload() }}
            </div>
            <div class="pl-3">
                @foreach ($post->tags as $tag)
                    <livewire:component.tag-button :tag="$tag" :wire:key="'tag-'.$tag->id" />
                @endforeach
            </div>
        </div>
        <div class="flex justify-between items-center mb-2">
            <div class="not-prose flex items-center order-first">
                <livewire:component.user-link :user="$post->user" :wire:key="'user-'.$post->user->id" />
            </div>
            <div class="flex items-center justify-end space-x-4">
                <div>Likes: {{ $post->likes()->count() }}</div>
                @auth
                    @if ($post->user->id != Auth::user()->id)
                        <livewire:post.like-button :post="$post" />
                    @endif
                    <livewire:post.share-button :post="$post" />
                    <livewire:post.post-dropdown :actions="$post->user->id == Auth::user()->id ? ['edit', 'delete'] : ['report']" :post="$post" :wire:key="'post-dropdown'" />
                    @if ($post->user->id == Auth::user()->id)
                        <!-- Post Delete Confirmation Modal -->
                        <x-jet-dialog-modal wire:model="confirmingPostDeletion">
                            <x-slot name="title">
                                {{ __('Delete Post') }}
                            </x-slot>

                            <x-slot name="content">
                                {{ __('Are you sure you want to delete this post?') }}
                            </x-slot>

                            <x-slot name="footer">
                                <x-jet-secondary-button wire:click="$toggle('confirmingPostDeletion')"
                                    wire:loading.attr="disabled">
                                    {{ __('Cancel') }}
                                </x-jet-secondary-button>

                                <x-jet-danger-button class="ml-3" wire:click="deletePost" wire:loading.attr="disabled">
                                    {{ __('Yes, do it') }}
                                </x-jet-danger-button>
                            </x-slot>
                        </x-jet-dialog-modal>
                    @endif
                @endauth
            </div>
        </div>
        <article class="ck-content">
            {!! $post->content !!}
        </article>

        <div>
            <div class="space-y-5 mb-5 border-top mt-4 pt-5">
                <h3>Comments</h3>
                @auth
                    <livewire:post.comment-area :post="$post" />
                @endauth
                <div class="flex flex-col space-y-3">
                    @foreach ($comments as $comment)
                        <livewire:post.comment :comment="$comment" :wire:key="'comment-'.$comment->id" />
                    @endforeach
                    {{ $comments->links() }}
                </div>

            </div>
        </div>
    </div>
</article>
