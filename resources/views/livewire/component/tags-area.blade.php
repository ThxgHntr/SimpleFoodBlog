<div x-data="{ tagInput: '', tags: @entangle('tags').defer }">
    <x-jet-label for="tags" value="{{ __('Tags') }}" />
    <div id="tags"
        class="container flex flex-wrap items-center p-1 mt-1 w-full border border-gray-300 rounded-md shadow-sm">
        <template x-for="(tag,index) in tags" :key="index">
            <div class="px-2 mx-1 border border-btncolor rounded-2xl">
                <button @click.prevent=" tags.splice(index, 1) "
                    class="bg-transparent border-none text-gray-700 hover:text-gray-300" x-text="tag"></button>
            </div>
        </template>
        <input x-model="tagInput" x-bind="tagField"
            class="grow p-1 border-none focus:border-none rounded-none shadow-none" />
    </div>
</div>

@push('scripts')
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.bind('tagField', () => ({

                type: 'text',

                '@keydown.tab.prevent'() {
                    tag = this.tagInput.toLowerCase().trim();
                    if (tag.length > 0) {
                        this.tags.push(tag);
                        this.tagInput = '';
                    }
                },

                '@keydown.backspace'() {
                    if (!this.tagInput && this.tags.length > 0) {
                        this.tagInput = this.tags.pop()
                    }
                },

            }))
        })
    </script>
@endpush
