<x-layout>
    @guest
        <x-unauth></x-unauth>
    @endguest

    @auth

        <div class="container1 w-full">
            <h1 class="title mb-5 text-center">Account Information</h1>

            <p class="m-2"><strong>Name:</strong> {{ $user->name }}</p>
            <p class="m-2"><strong>Email:</strong> {{ $user->email }}</p>
            <p class="m-2"><strong>Created in:</strong> {{ $user->created_at->format('d/m/Y') }}</p>

            <div class="mt-5 text-center">
                <a href="{{ route('dashboard') }}" class="inline-block btn-blue">
                    Back to Dashboard
                </a>
            </div>
        </div>
    @endauth
</x-layout>