<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-4 py-2 bg-white border border-btncolor-hover rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-btncolor-hover hover:text-white active:bg-btncolor-active disabled:opacity-25 transition ease-in-out duration-200']) }}>
    {{ $slot }}
</button>
