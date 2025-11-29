<x-layout>
    <div class="container1">

        <h1 class="title1">
            Create a new account
        </h1>

        {{-- Flash or error messages --}}
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded space-y-1">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST" class="space-y-5">
            @csrf

            <flux:input class="txt-box" label="Name" name="name" placeholder="Enter your name"
                value="{{ old('name') }}" />

            <flux:input class="txt-box" label="Email" type="email" name="email" placeholder="Enter your email"
                value="{{ old('email') }}" />

            <flux:input class="txt-box" label="Password" type="password" name="password"
                placeholder="Enter your password" />

            <flux:input class="txt-box" label="Confirm password" type="password" name="password_confirmation"
                placeholder="Confirm your password" />

            <button type="submit" class="btn-blue">
                Register
            </button>
        </form>

        <p class="text-center text-sm text-gray-600">
            Already have an account ?
            <a href="{{ route('login') }}" class="text-blue-700 hover:underline">
                Sign in
            </a>
        </p>

    </div>
</x-layout>