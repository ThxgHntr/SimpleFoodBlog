@section('title', $user->name)
<div class="flex flex-col space-y-10 w-full min-h-screen">
    <div class="flex justify-center">
        <div
            class="flex flex-wrap lg:flex-nowrap p-10 w-4/5 space-x-0 space-y-10 lg:space-x-10 lg:space-y-0 h-fit bg-white rounded-lg shadow-xl">
            <img src="{{ $user->profile_photo_url }}" class="w-40 h-40 ring-2 ring-btncolor ring-offset-2 rounded-full">
            <div class="flex flex-col justify-between space-y-4">
                <div class="text-3xl font-bold">
                    {{ $user->name }}
                </div>
                <div class="text-xl font-semibold leading-normal">
                    {{ $user->des }}
                </div>
                <span
                    class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-900 via-btncolor-hover to-lime-600">
                    Total likes: {{ $user->totalLikes()->count() }}
                </span>
            </div>
        </div>
    </div>
    <div class="flex justify-center pt-10">
        <div class="flex flex-col gap-3 sm:w-full lg:w-2/5 h-fit">
            <div class="flex flex-col bg-white rounded-lg shadow-xl divide-y mb-4">
                <p class="text-center font-bold text-2xl p-2">
                    Posts
                </p>
                <div class="flex justify-center space-x-20 p-2">
                    <div class="flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <p class="text-center font-semibold text-xl">
                            List view
                        </p>
                    </div>
                    <div class="flex flex-row items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-8 h-8">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                        </svg>
                        <p class="text-center font-semibold text-xl">
                            Grid view
                        </p>
                    </div>
                </div>
            </div>

            @foreach ($posts as $post)
                <div class="bg-white rounded-lg shadow-xl">
                    <livewire:component.single-post :post="$post" :wire:key="'$post-'.$post->id" />
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>
    </div>
</div>
