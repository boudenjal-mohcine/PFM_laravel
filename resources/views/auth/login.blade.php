<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap5/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('img/logo.png') }}">
    <title>North Travel Agency | Login</title>
</head>
<body background="{{ asset('img/this.jpg') }}">
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5"><b>North Travel</b> Agency</h2>
            <div class="card my-5">
              <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ Route('auth.check') }}">
                @if (Session::get('success'))
                <div class="alert alert-success">
                  {{ Session::get('success') }}
                </div>
                @endif
  
                @if (Session::get('fail'))
                <div class="alert alert-danger">
                  {{ Session::get('fail') }}
                </div>
                @endif
              @csrf
                <div class="text-center">
                  <img src="{{ asset('img/logo.png') }}" class="img-fluid profile-image-pic" width="200px" alt="profile">
                </div>
    
                <div class="mb-3">
                  <label>Adresse Email</label>
                  <input type="text" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Email" value="{{ old('email') }}">
                  <span class="text-danger">@error('email'){{ $message }}@enderror</span>
                </div>

                <div class="mb-3">
                  <label>Mot de passe</label>
                  <input type="Password" class="form-control" name="password" placeholder="password" value="{{ old('password') }}">
                  <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                </div>

                <div class="text-center"><button type="submit" class="btn btn-danger px-5 mb-5 w-100">Login</button></div>
                <div id="emailHelp" class="form-text text-center mb-5 text-dark">Non inscrit? <a href="{{ Route('auth.register') }}" class="text-dark fw-bold"> Crée un compte</a>
                </div>
              </form>
            </div>
    
          </div>
        </div>
      </div>
    
</body>
</html>