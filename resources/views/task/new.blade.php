<x-layout>
    @guest
        <x-unauth>

        </x-unauth>
    @endguest

    @auth
        <div class="container1">
            {{-- Nav breadcrumbs --}}
            <flux:breadcrumbs>
                <flux:breadcrumbs.item href="{{ route('project.all') }}">Projects</flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="{{ route('project.detail', $project) }}">{{ $project->name }}
                </flux:breadcrumbs.item>
                <flux:breadcrumbs.item href="#">New Task</flux:breadcrumbs.item>
            </flux:breadcrumbs>
            <h1 class="title1">
                Create a task
            </h1>

            <form action="{{ route('task.submit', $project) }}" method="POST" class="space-y-5">
                @csrf

                <flux:input class="txt-box" label="Name" name="name" placeholder="Give your task a name"
                    value="{{ old('name') }}" />

                <flux:textarea class="txt-box" label="Description" name="description" placeholder="Easy peasy task"
                    value="{{ old('description') }}" />

                <flux:input class="txt-box" label="Due date" name="deadline" type="date"
                    placeholder="Choose the due date of the task" value="{{ old('deadline') }}" />

                <flux:select label="Priority" name="priority" class="max-w-fit" placeholder="Choose a priority">
                    <flux:select.option value="low">Low</flux:select.option>
                    <flux:select.option value="medium">Medium</flux:select.option>
                    <flux:select.option value="high">High</flux:select.option>
                </flux:select>

                <button type="submit" class="btn-blue mt-3">
                    Create
                </button>
            </form>

        </div>
    @endauth
</x-layout>