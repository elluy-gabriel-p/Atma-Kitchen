<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="loginStyle.css">
    <title>Atma Kitchen</title>
</head>

<body>

    <div class="container" id="container">
        <div class="form-container sign-up">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <form method="post" action="{{ route('actionRegister') }}">
                @csrf
                <h1>Create Account</h1>
                <span>use your email for registration</span>
                <input class="form-control" type="text" name="name" placeholder="Name" required>
                <input class="form-control" type="email" name="email" placeholder="Email" required>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <button type="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            <form method="post" action="{{ route('actionLogin') }}">
                @csrf
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                <h1>Sign In</h1>
                <span>use your email password</span>
                <input class="form-control" type="text" name="email" placeholder="Email" required>
                <input class="form-control" type="password" name="password" placeholder="Password" required>
                <a href="/forgot-password">Forget Your Password?</a>
                <button type="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <p>Isi semua form yang tersidia untuk dapat membuat sebuah akun</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello, Friend!</h1>
                    <p>Lakukan Register untuk dapat menggunakan semua fitur di dalam situs</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <script src="loginScript.js"></script>
</body>

</html>
