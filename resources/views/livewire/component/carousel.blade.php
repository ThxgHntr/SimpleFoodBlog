<div x-data="{ selected: 0, pictures: @entangle('pictures').defer }" class="relative {{ $attributes }}">
    <img :src="pictures[selected]" class="object-cover w-full max-h-96 rounded-lg">
    <div class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4">
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-transparent hover:bg-white/50 cursor-pointer">
            <svg @click="selected <= 0 ? selected = pictures.length - 1 : selected -= 1" aria-hidden="true"
                class="w-5 h-5 text-gray-500 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                </path>
            </svg>
        </span>
    </div>
    <div class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4">
        <span
            class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-transparent hover:bg-white/50 cursor-pointer">
            <svg @click="selected < pictures.length - 1  ? selected += 1 : selected = 0" aria-hidden="true"
                class="w-5 h-5 text-gray-500 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                </path>
            </svg>
        </span>
    </div>

    <div class="absolute bottom-0 w-full p-4 flex justify-center space-x-2">
        <template x-for="(picture,index) in pictures" :key="index">
            <button @click="selected = index"
                :class="{ 'bg-gray-300': selected == index, 'bg-gray-500': selected != index }"
                class="h-2 w-2 rounded-full hover:bg-gray-300">
            </button>
        </template>
    </div>
</div>
