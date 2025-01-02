<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Form</title>
  <link rel="stylesheet" href="{{ asset('/css/login_style.css') }}">
</head>
<body>
  <div class="login-container">
    <img src="/Image/norton.png" alt="Logo">
    @if($errors->has('email'))
      <div class="alert alert-danger">
        {{$errors->first('email')}}
      </div>
    @endif
    <form action="{{route('admin.login')}}" method="GET">
        @csrf
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
      </div>
      <button type="submit" class="btn">Login</button>
      <div class="footer">
        <p><a href="#">Forget password ?</a></p>
      </div>
    </form>
  </div>
</body>
</html>

