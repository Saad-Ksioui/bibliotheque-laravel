<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: serif
    }

    .container {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .loginForm {
      width: 350px;
      background-color: #f9f9f9;
      padding: 20px;
      border-radius: 20px;
      box-shadow: 4px 10px 24px -9px rgba(0, 0, 0, 0.75);
      -webkit-box-shadow: 4px 10px 24px -9px rgba(0, 0, 0, 0.75);
      -moz-box-shadow: 4px 10px 24px -9px rgba(0, 0, 0, 0.75);
    }

    .loginForm h1 {
      text-align: center;
      font-weight: 700
    }

    .loginForm form {
      display: flex;
      flex-direction: column;
    }

    .formInput {
      margin-bottom: 15px;
    }

    .formInput input {
      width: 100%;
      height: 40px;
      padding: 8px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    .formCheckbox {
      display: flex;
      align-items: center;
      margin-bottom: 10px
    }

    .formCheckbox input {
      margin-right: 5px;
    }

    .formSubmitButton {
      text-align: center;
    }

    .formSubmitButton input {
      width: 100%;
      height: 40px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      margin-bottom: 10px
    }

    .formSubmitButton input:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="loginForm">
      @if (session()->has('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
      @endif
      <h1>Login</h1>
      <form action="{{ route('login.user') }}" method="post">
        @csrf
        <div class="formInput">
          <input type="email" name="email" placeholder="Email" required>
        </div>
        @error('email')
            <span class="text-danger">{{ $message }}</span>
        @enderror

        <div class="formInput">
          <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="formCheckbox">
          <input type="checkbox" name="rememberme" id="rememberMe">
          <label for="rememberMe">Remember Me</label>
        </div>

        <div class="formSubmitButton">
          <input type="submit" value="Login">
          <a href="{{ route('register') }}">Je n'ai pas de compte !</a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>
