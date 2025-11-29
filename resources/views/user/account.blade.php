<x-layout>
    <div class="max-w-xl w-full mx-auto bg-white p-6 rounded shadow">
        <h1 class="title mb-4">Account Information</h1>

        <p><strong>Name:</strong> {{ $user->name }}</p>
        <p class="mt-2"><strong>Email:</strong> {{ $user->email }}</p>

        <button class="mt-5 btn-blue">
            <a href="{{ route('dashboard') }}">Back to Dashboard</a>
        </button>
    </div>
</x-layout>