@section('title', 'Feed')
<div class="min-h-screen">
    <div class="flex justify-center h-96">
        <livewire:component.carousel :pictures="$pictures" :attributes="'w-4/5'" />
    </div>
    {{-- @auth
        <div
            class="flex flex-wrap place-content-center space-x-0 space-y-4 sm:space-x-8 sm:space-y-0 w-4/5 h-auto py-10 mx-auto my-4 border-b border-y-btncolor-hover">
            <div class="w-80">
                <p class="font-bold inline-flex mb-3 border-b-2 border-b-btncolor-hover text-2xl">
                    For you
                </p>
                <div class="w-auto h-auto bg-white shadow-md overflow-hidden rounded-lg">
                    <livewire:user.post-for-you />
                </div>
            </div>
            <div class="w-80">
                <p class="font-bold inline-flex mb-3 border-b-2 border-b-btncolor-hover text-2xl">
                    Trending
                </p>
                <div class="flex flex-col space-y-4 w-auto h-auto">
                    @foreach ($trendingPosts as $tdPost)
                        <div class="h-1/3 bg-white shadow-md overflow-hidden rounded-lg">
                            <livewire:user.trending-posts :wire:key="'tdPost-'.$tdPost->id" :post="$tdPost" />
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="w-80">
                <p class="font-bold inline-flex mb-3 border-b-2 border-b-btncolor-hover text-2xl">
                    Popular
                </p>
                <div class="w-auto h-auto bg-white shadow-md overflow-hidden rounded-lg">
                    <livewire:user.popular-post />
                </div>
            </div>
        </div>
    @endauth --}}
    <div class="flex justify-center">
        <div
            class="my-10 min-w-fit max-w-screen-lg lg:mx-32 lg:grid lg:grid-cols-3 lg:gap-10 sm:max-w-screen sm:flex sm:flex-col">
            <div class="space-y-6 col-span-2">
                <p class="font-bold inline-flex border-b-2 border-b-btncolor-hover text-2xl">
                    Recent posts
                </p>
                @foreach ($recentPosts as $post)
                    <div class="h-fit bg-white shadow-md overflow-hidden rounded-lg">
                        <livewire:component.single-post :wire:key="'post-'.$post->id" :post="$post" />
                    </div>
                @endforeach
                {{ $recentPosts->links() }}
            </div>

            <div class="flex flex-col space-y-6">
                <div class="flex flex-col h-fit p-4 rounded-lg bg-white border-t-4 border-t-btncolor-hover shadow-md">

                    <p class="flex justify-center font-bold mb-3 text-2xl">
                        Tags
                    </p>

                    <!-- Search bar -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                class="absolute text-slate-400 w-5 h-5">
                                <path fill-rule="evenodd"
                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                    clip-rule="evenodd" />
                            </svg>
                        </div>
                        <x-jet-input class="self-center text-sm w-full pl-10 py-2 px-3 rounded-2xl bg-gray-50"
                            type="text" wire:model.defer='search' wire:keydown.enter='search' placeholder="Type & hit Enter" >
                        </x-jet-input>
                    </div>
                    <div class="flex flex-wrap p-4">
                        @foreach ($tags as $tag)
                            @livewire('component.tag-button', ['tag' => $tag, 'attributes' => 'text-base'], key($tag->id))
                        @endforeach
                    </div>
                </div>

                <div class="flex flex-col h-fit p-4 rounded-lg bg-white border-t-4 border-t-btncolor-hover shadow-md">
                    <p class="flex justify-center font-bold mb-3 text-2xl">
                        Most added tags
                    </p>
                    <div class="flex flex-col divide-y">
                        @foreach ($topTags as $tag)
                            @livewire('component.tag-link', ['tag' => $tag], key($tag->id))
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
