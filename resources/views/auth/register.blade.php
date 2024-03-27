<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register</title>
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
      <h1>Register</h1>
      <form action="{{ route('register.user') }}" method="post">
        @csrf
        <div class="formInput">
          <input type="text" name="nom" placeholder="Nom">
        </div>

        <div class="formInput">
          <input type="text" name="prenom" placeholder="Prenom">
        </div>

        <div class="formInput">
          <input type="text" name="username" placeholder="Username">
        </div>

        <div class="formInput">
          <input type="email" name="email" placeholder="Email">
        </div>

        <div class="formInput">
          <input type="password" name="password" placeholder="Password">
        </div>

        <div class="formSubmitButton">
          <input type="submit" value="Register">
          <a href="{{ route('login') }}">J'ai déjà un compte !</a>
        </div>

      </form>
    </div>
  </div>
</body>

</html>
