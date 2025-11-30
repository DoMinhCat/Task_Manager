@guest
    <div class="w-full responsive">
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
        <div class="container1">

            <h1 class="title1">
                Create a new project
            </h1>

            <form action="{{ route('submit_project') }}" method="POST" class="space-y-5">
                @csrf

                <flux:input class="txt-box" label="Name" name="name" placeholder="Give your project a name"
                    value="{{ old('name') }}" />

                <flux:textarea class="txt-box" label="Description" name="description"
                    placeholder="This is a wonderful project" value="{{ old('description') }}" />

                <flux:input class="txt-box" label="Due date" name="deadline" type="date"
                    placeholder="Choose the due date of the project" value="{{ old('deadline') }}" />

                <button type="submit" class="btn-blue">
                    Create
                </button>
            </form>

        </div>
    </x-layout>
@endauth