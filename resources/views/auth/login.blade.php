

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
    <script src="../js/jquery-3.7.1.min.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>

