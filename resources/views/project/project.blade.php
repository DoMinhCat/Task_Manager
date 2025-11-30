@guest
    <div class="w-full max-w-md sm:max-w-lg md:max-w-xl lg:max-w-2xl">
        <flux:callout icon="x-mark" color="red">
            <flux:callout.heading>You need to sign in to view this page.</flux:callout.heading>
            <x-slot name="actions">
                <flux:button class="btn-blue" href="/login">Sign in</flux:button>
            </x-slot>
        </flux:callout>
    </div>
@endguest

@auth
    <x-layout>
        Single Proj page
    </x-layout>
@endauth