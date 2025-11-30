<x-layout>
    <div class="container1 w-full">
        <h1 class="title mb-4">Account Information</h1>

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p class="m-2"><strong>Email:</strong> {{ $user->email }}</p>
        <p class="m-2"><strong>Created in:</strong> {{ $user->created_at }}</p>

        <button class="mt-5 btn-blue">
            <a href="{{ route('dashboard') }}">Back to Dashboard</a>
        </button>
    </div>
</x-layout>