<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/loginForm.css')}}">
    <title>Login</title>
</head>
<!--  -->

<body>
    <div class="container">
        <form action="adminLoginProcess" method="POST" class="login-form">
            <h2>Admin Login</h2>
            @csrf
            <div class="form-group">
                <label for="username">Username *</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password *</label>
                <input type="password" id="password" name="password" required>
            </div>
            <input type="submit" class="login-button" value="Login">
        </form>

        @if(Session::has('error'))
        <div class="error-message">
            {{ Session::get('error') }}
        </div>
        @endif
    </div>
</body>

</html>