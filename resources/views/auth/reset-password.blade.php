{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>  

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" href="{{ asset('assets/images/icon.png') }}">
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
                <form method="POST" action="{{ route('password.store') }}" class="f-w-card-fl">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="card-fl-bd">
                        @if (session('status'))
                            <div class="success-message-wrapper">
                                <span class="success">{{ session('status') }}</span>
                            </div>
                        @endif
                        <label for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email', $request->email) }}"
                            required>
                        @error('email')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <label for="password">New Password</label>
                        <input id="password" name="password" type="password" required>
                        @error('password')
                            <span class="error">{{ $message }}</span>
                        @enderror
                        <label for="password_confirmation">Confirm Password</label>
                        <input id="password_confirmation" name="password_confirmation" type="password" required>
                        @error('password_confirmation')
                            <span class="error">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="card-fl-ft">
                        <button type="submit" class="btn">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <script src="../jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>
