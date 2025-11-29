<x-layout>
    <div class="container1 responsive">

        <h1 class="title1">
            Sign in to Task Manager
        </h1>

        @if(session('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded">
                {{ session('error') }}
            </div>
        @endif

        <form action="{{ route('login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <flux:input class="txt-box" label="Email" type="email" name="email" placeholder="Enter your email"
                value="{{ old('email') }}" />

            <flux:input class="txt-box" label="Password" type="password" name="password"
                placeholder="Enter your password" />

            <button type="submit" class="btn-blue">
                Sign in
            </button>
        </form>

        <p class="text-center text-sm text-gray-600">
            Don't have an account yet ?
            <a href="{{ route('register') }}" class="text-blue-700 hover:underline">
                Create a new account
            </a>
        </p>

    </div>
</x-layout>