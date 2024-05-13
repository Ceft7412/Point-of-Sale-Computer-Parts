{{-- <x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Email Password Reset Link') }}
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
        <div class="f-w">
            <div class="f-w-back">
                <span class="b-wr">
                    <a href="{{ route('login') }}" class="btn-back">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </span>
            </div>
            <div class="f-w-logo">
                <img src="../assets/images/horizontal-logo.png" alt="Computer Parts" class="">
            </div>
            <div class="f-w-card">
                <form method="POST" action="{{ route('password.email') }}" class="f-w-card-fl">
                    @csrf
                    <div class="card-fl-hd">
                        <span class="">Enter the email address associated with your account and we'll send you a link to reset your password.</span>
                    </div>
                    <div class="card-fl-bd">
                        @if (session('status'))
                        <div class="success-message-wrapper">
                            <span class="success">{{ session('status') }}</span>
                        </div>
                         @endif
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email">
                    </div>
                    <div class="card-fl-ft">
                        <button type="submit" class="btn">Send Password Reset Link</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>

