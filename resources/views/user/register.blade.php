<x-layout>
    <div class="container1">

        <h1 class="title1">
            Create a new account
        </h1>

        <form action="{{ route('register.submit') }}" method="POST" class="space-y-5">
            @csrf

            <flux:input class="txt-box" label="Name" name="name" placeholder="Enter your name"
                value="{{ old('name') }}" />

            <flux:input class="txt-box" label="Email" type="email" name="email" placeholder="Enter your email"
                value="{{ old('email') }}" />

            <flux:input class="txt-box" label="Password" type="password" name="password"
                placeholder="Choose your password" value="{{ old('password') }}" />

            <flux:input class=" txt-box" label="Confirm password" type="password" name="password_confirmation"
                placeholder="Confirm your password" value="{{ old('password_confirmation') }}" />

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