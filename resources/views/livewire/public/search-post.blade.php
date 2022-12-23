@section('title', 'Search')
<div class="w-full h-screen">
    <div class="px-20 space-y-4">
        <h1 class="font-bold inline-flex border-b-2 p-2 border-b-btncolor-hover text-4xl">
            Searching for tags:&nbsp;<a class="text-btncolor-hover">{{ implode(', ', $tags) }}</a>
        </h1>
        <div class="py-6 space-y-2 lg:mx-60 md:mx-40">
            @foreach ($posts as $post)
                <div class="h-auto bg-white shadow-md overflow-hidden rounded-lg">
                    <livewire:component.single-post :wire:key="'post-'.$post->id" :post="$post" />
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
