<x-layout>
    @guest
        <x-unauth></x-unauth>
    @endguest

    @auth
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 py-8 px-4 sm:px-6 lg:px-8">
            <div class="max-w-7xl mx-auto">

                {{-- Success --}}
                @if(session('success'))
                    <div class="w-full responsive mb-4">
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

                {{-- Header --}}
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8 gap-4">
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $project->name }}
                    </h1>

                    @if($tasks->count() > 0)
                        <a href="{{ route('new_task', $project->id) }}"
                            class="inline-flex items-center justify-center px-5 py-2.5 bg-blue-600 hover:bg-blue-700 
                                                                                              text-white font-medium rounded-lg shadow-sm hover:shadow-md transition">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                            New Task
                        </a>
                    @endif
                </div>

                {{-- Empty State --}}
                @if($tasks->count() < 1)
                    <div class="container1 text-center">
                        <h2>No tasks yet for this project</h2>
                        <a href="{{ route('new_task', $project->id) }}" class="btn-blue">Create a task</a>
                    </div>
                @else

                    {{-- Tasks Table --}}
                    <div
                        class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead class="bg-gray-50 dark:bg-gray-900">
                                    <tr>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                            Task</th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                            Status</th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                            Priority</th>
                                        <th
                                            class="px-6 py-4 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                                            Deadline</th>
                                    </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($tasks as $task)
                                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 transition-colors duration-150">

                                            {{-- Task --}}
                                            <td class="px-6 py-4">
                                                <a href="{{ route('one_task', [$project->id, $task->id]) }}"
                                                    class="font-semibold text-gray-900 dark:text-gray-100 hover:text-blue-600 dark:hover:text-blue-400 transition">
                                                    {{ $task->title }}
                                                </a>
                                            </td>

                                            {{-- Status --}}
                                            <td class="px-6 py-4">
                                                <span
                                                    class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium @if($task->status === 'completed') bg-green-100 dark:bg-green-900/30 text-green-700 dark:text-green-400 @elseif($task->status === 'in_progress') bg-blue-100 dark:bg-blue-900/30 text-blue-700 dark:text-blue-400 @else bg-yellow-100 dark:bg-yellow-900/30 text-yellow-700 dark:text-yellow-400  @endif">
                                                    <span
                                                        class="w-1.5 h-1.5 rounded-full mr-1.5 @if($task->status === 'completed') bg-green-500 @elseif($task->status === 'in_progress') bg-blue-500 @else bg-yellow-500 @endif">
                                                    </span>
                                                    {{ ucfirst(str_replace('_', ' ', $task->status)) }}
                                                </span>
                                            </td>

                                            {{-- Priority --}}
                                            <td class="px-6 py-4">
                                                <span
                                                    class="font-semibold  @if($task->priority === 3) text-red-500 @elseif($task->priority === 2) text-yellow-500 @else text-green-500 @endif">
                                                    {{ ucfirst($task->priority) }}
                                                </span>
                                            </td>

                                            {{-- Deadline --}}
                                            <td class="px-6 py-4 text-gray-600 dark:text-gray-400">
                                                @if($task->due_at)
                                                    <div class="flex items-center text-sm">
                                                        <svg class="w-4 h-4 mr-1.5 text-gray-400" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                                        </svg>
                                                        {{ $task->due_at->format('d/m/Y') }}
                                                    </div>
                                                @else
                                                    <span class="text-sm text-gray-400 dark:text-gray-600">No deadline</span>
                                                @endif
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    {{-- Footer --}}
                    <div class="mt-4 text-center">
                        <p class="text-sm text-gray-600 dark:text-gray-400">
                            Showing <span class="font-medium text-gray-900 dark:text-gray-100">{{ $tasks->count() }}</span>
                            task{{ $tasks->count() !== 1 ? 's' : '' }}
                        </p>
                    </div>

                @endif
            </div>
        </div>
    @endauth
</x-layout>