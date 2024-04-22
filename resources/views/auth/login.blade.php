{{-- <x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
            @endif

            <x-primary-button class="ms-3">
                {{ __('Log in') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../dest/css/style.css">
</head>

<body>
    <div class="wrapper">
        <div class="l-wrapper">

            <div class="l-flex">
                <div class="l-form-wrapper">
                    <div class="l-heading">
                        <span class="l-logo">
                            <img src="../assets/images/horizontal-logo.png" alt="Computer Parts" class="">
                        </span>
                        <div class="l-text">
                            <span class="">Sign in</span>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="error-message-wrapper">
                            @foreach ($errors->all() as $error)
                                <span class="error">{{ $error }}</span>
                            @endforeach
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="error-message-wrapper">
                            <span class="error">{{ session('error') }}</span>
                        </div>
                    @endif
                    <form action="{{ route('login.store') }}" method="POST" class="l-form">
                        @csrf
                        <div class="l-field">

                            <input type="text" name="username" id="" placeholder=" ">
                            <label for="">Username</label>
                        </div>
                        <div class="l-field password">

                            <input type="password" name="password" id="password" placeholder=" ">
                            <label for="">Password</label>
                            <span id="toggle-password"><i class="bi bi-eye-slash-fill"></i></span>

                        </div>
                        <div class="l-footer">
                            <span class="l-forgot">Forgot username or password?</span>
                            <button type="submit" class="l-signin">Sign in</button>
                        </div>
                    </form>

                </div>
                <div class="l-bi">
                    <img src="../assets/images/computer-parts.png" alt="Computer Parts" class="">
                </div>
            </div>
        </div>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>

