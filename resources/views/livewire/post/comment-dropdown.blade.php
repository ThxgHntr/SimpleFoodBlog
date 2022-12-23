<x-jet-dropdown align="right" width="fit">
    <x-slot name="trigger">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="w-6 h-6 hover:cursor-pointer" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M12 6.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 12.75a.75.75 0 110-1.5.75.75 0 010 1.5zM12 18.75a.75.75 0 110-1.5.75.75 0 010 1.5z" />
        </svg>
    </x-slot>

    <x-slot name="content">
        @foreach ($actions as $action)
            <button wire:click="makeAction('{{ $action }}')"
                class="text-base text-left px-3 py-2 w-full text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition">
                {{ $action }}</button>
        @endforeach
    </x-slot>
</x-jet-dropdown>
