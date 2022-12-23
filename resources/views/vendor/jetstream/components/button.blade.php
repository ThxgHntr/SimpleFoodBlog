<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-btncolor border-none rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-btncolor-hover active:bg-btncolor-active disabled:opacity-25 transition ease-in-out duration-200']) }}>
    {{ $slot }}
</button>