<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, 
                                initial-scale=1, shrink-to-fit=no">

  <link rel="stylesheet" href="/css/app.css">
  
  <script src="/js/app.js"></script>

  <style>
    div.container {
      text-align: center;
    }
    div>img {
      margin: 110px 0 12px 0;
    }
    .form-control {
      display: inline-block;
      width: auto;
      position: relative;
    }
  </style>

  <script>
    $(function() {
      $(":text").keydown(function() {
        $(".alert-danger").fadeOut(0);
      });
      $("#password").keydown(function() {
        $(".alert-danger").fadeOut(0);
      });
    });
  </script>

</head>
<body>
  <div class="container">
    <img class="img-rounded" src="{{asset('images/pink_logo.png')}}"
      alt="SheCodes Logo" width="20%" height="auto">
  </div>

  <div class="container">
    @if ($errors->any())
      <div class="alert alert-danger" style="display: inline-block;">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif
    <form id="login_form" name="login_form" action="{{route('login')}}"
      method="post">
      {{ csrf_field() }}
      <div class="form-group">
        <!-- <label for="username">Username:</label> -->
        <input type="text" id="username" class="form-control"
          placeholder="username" name="username"
          value="{{ old('username') }}" autofocus>
      </div>

      <div class="form-group">
        <!-- <label for="password">Password:</label> -->
        <input type="password" id="password" class="form-control"
          placeholder="password" name="password">
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-dark">
          Login
        </button>
      </div>

    </form>

  </div>
</body>
</html>
