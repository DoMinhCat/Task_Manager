<x-layout>
    @if(session('success'))
        <div class="w-full responsive">
            <div x-data="{ visible: true }" x-show="visible" x-collapse>
                <div x-show="visible" x-transition>
                    <flux:callout icon="check" color="green">
                        <flux:callout.heading>{{ session('success') }}</flux:callout.heading>

                        <x-slot name="controls">
                            <flux:button icon="x-mark" variant="ghost" x-on:click="visible = false" />
                        </x-slot>
                    </flux:callout>
                </div>
            </div>
        </div>
    @endif
</x-layout>