@section('title', 'Users')
<div class="w-full min-h-screen">
    <div class="px-20 space-y-4">
        <h1 class="font-bold inline-flex border-b-2 p-2 border-b-btncolor-hover text-4xl">
            All user
        </h1>
        <div class="flex justify-center items-center w-full space-x-2">
            <div class="relative w-1/2">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                        class="absolute text-slate-400 w-6 h-6">
                        <path fill-rule="evenodd"
                            d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                            clip-rule="evenodd" />
                    </svg>
                </div>
                <x-jet-input class="w-full pl-10 rounded-2xl" type="text"
                    wire:model='search' placeholder="Enter user's name"/>
            </div>
            <x-jet-dropdown align="right" width="fit">
                <x-slot name="trigger">
                    <svg x-data="{ fill: false }" xmlns="http://www.w3.org/2000/svg" fill="btncolor" viewBox="0 0 24 24"
                        stroke-width="1.5" stroke="currentColor"
                        class="w-6 h-6 transition ease-in-out duration-3000 hover:cursor-pointer"
                        :class="fill ? 'fill-btncolor-active' : 'fill-btncolor'" @click="fill = !fill"
                        @click.outside="fill = false">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 3c2.755 0 5.455.232 8.083.678.533.09.917.556.917 1.096v1.044a2.25 2.25 0 01-.659 1.591l-5.432 5.432a2.25 2.25 0 00-.659 1.591v2.927a2.25 2.25 0 01-1.244 2.013L9.75 21v-6.568a2.25 2.25 0 00-.659-1.591L3.659 7.409A2.25 2.25 0 013 5.818V4.774c0-.54.384-1.006.917-1.096A48.32 48.32 0 0112 3z" />
                    </svg>
                </x-slot>

                <x-slot name="content">
                    <button wire:click="setOrder('postsAsc')"
                        class="flex flex-row text-left px-3 py-2 w-full text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                        </svg>
                        Posts
                    </button>
                    <button wire:click="setOrder('postsDesc')"
                        class="flex flex-row text-left px-3 py-2 w-full text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                        </svg>
                        Posts
                    </button>
                    <button wire:click="setOrder('likesAsc')"
                        class="flex flex-row text-left px-3 py-2 w-full text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 19.5v-15m0 0l-6.75 6.75M12 4.5l6.75 6.75" />
                        </svg>
                        Likes
                    </button>
                    <button wire:click="setOrder('likesDesc')"
                        class="flex flex-row text-left px-3 py-2 w-full text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 4.5v15m0 0l6.75-6.75M12 19.5l-6.75-6.75" />
                        </svg>
                        Likes
                    </button>
                </x-slot>
            </x-jet-dropdown>
        </div>
        <div class="flex flex-wrap justify-between">
            @foreach ($users as $user)
                <div class="bg-white shadow-md rounded-lg mb-3">
                    <livewire:component.user-card :wire:key="'user-'.$user->id" :user="$user" />
                </div>
            @endforeach
            {{ $users->links() }}
        </div>
    </div>
</div>
