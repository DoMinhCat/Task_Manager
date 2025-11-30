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
    @if($projects->count() < 1)
        <x-layout>
            <div class="container1 text-center">
                <h2>You haven't created any project yet</h2>
                <a href="{{ route('new_project') }}" class="btn-blue">
                    Create my first project
                </a>
            </div>
        </x-layout>
    @else
        <x-layout>
            @foreach ($projects as $project)
                <a href="{{ route('one_project', $project->id) }}">
                    <div
                        class="card dark:bg-neutral-900 border dark:border-neutral-800 hover:shadow-lg transition cursor-pointer p-4 rounded-xl">
                        <div class="flex justify-between items-center">
                            <!-- Left side: Project name + owner -->
                            <!-- Right side: Status badge -->
                        </div>

                        <div class="mt-4 text-sm text-neutral-500">
                            Due: <date>
                        </div>

                        <div class="mt-2 text-sm">
                            <strong>{{ $project->tasks->count() . $project->tasks->count() > 1 ? 'tasks' : 'task' }} </strong>
                        </div>
                    </div>

                </a>
            @endforeach
        </x-layout>
    @endif
@endauth