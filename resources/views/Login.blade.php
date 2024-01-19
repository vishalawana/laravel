<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Login</title>
</head>
<body class="">
    <h3 class="text-center text-light" style="margin-top: 100px;">Log In</h3>
  <div class="border border-secondary  bg-secondary text-light w-25 rounded mx-auto  h-100">
    <form class="container text-light mt-2 pb-5" method = "post" action="{{route('login')}}">
        @csrf
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />
        <div class="mb-1">
          <label for="loginEmail" class="form-label d-flex justify-content-center mt-4">Email  </label>
          <input type="email" class="form-control" value = "{{old('email')}}"id="loginEmail" aria-describedby="emailHelp" name = "email" placeholder="Email">
          <small class="text-warning" id="emailError">
            @error('email')
            {{$message}}
           @enderror
          </small>
        <div class="mb-3">
          <label for="loginPassword" class="form-label d-flex justify-content-center">Password</label>
          <input type="password" class="form-control" id="loginPassword" value = "{{old('password')}}"name = "password" placeholder="Enter your Password">
          <small class="text-warning" id="passwordError">
            @error('password')
            {{$message}}
           @enderror
          </small>

        </div>
       
        <button type="submit" id="login" name = "login" class="text-center btn btn-primary d-flex allign-item-center justify-content-center w-100">log in</button>
        <small><a href="{{('/')}}" class="text-warning text-center">New User?</a></small><br>
        <small class="text-warning" id="errorLogin"> 
            </small>
      </form>
</div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>