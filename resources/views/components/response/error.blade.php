@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="mb-2">
            <div class="w-full responsive">
                <div x-data="{ visible: true }" x-show="visible" x-collapse>
                    <div x-show="visible" x-transition>
                        <flux:callout icon="x-circle" color="red">
                            <flux:callout.heading>{{ $error }}</flux:callout.heading>

                            <x-slot name="controls">
                                <flux:button icon="x-mark" variant="ghost" x-on:click="visible = false" />
                            </x-slot>
                        </flux:callout>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif