<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href=" {{ asset('bootstrap5/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href=" {{ asset('css/styleaside.css') }}" rel="stylesheet" type="text/css">
        <script src={{ asset('vendor/jquery/jquery.min.js') }}></script>

         <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>North Travel Agency | Official site</title> 
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('bootstrap5/js/bootstrap.min.js') }}" ></script>
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

       <!-- Styles -->
       <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       <link rel="stylesheet" href="{{ asset('css/style.css') }}">
       <link rel="stylesheet" href="{{ asset('css/bestcitiesstyle.css') }}">
       <link rel="shortcut icon" href="{{ asset('img/logo.png') }} ">
    </head>



    <body class="bg-dark scroll4" style="overflow-x: hidden;">
            <nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top shadow bg-dark rounded" >
                <div class="container-fluid">
                    <img style="width: 70px;" class="rounded-pill" src="{{ asset('img/logo.png') }}" alt="logocompany">
                    <span class="navbar-brand">NORTH TRAVEL AGENCY</span> <!--navbar-text later if you want to change-->
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">  
                    <ul class="navbar-nav  ms-auto mb-2 "> <!-- nav-pills also works-->
                      <li class="nav-item">
                          <a class="nav-link active" href="{{ Route('welcome') }}" id="home">Home</a>
                        </li>
                      <li class="nav-item">
                          <a class="nav-link"  href="#"  id="vols"> Vols</a>
                      </li>
                      <li class="nav-item"><a class="nav-link" href="{{ Route('user.hotelslist') }}">Hotels</a></li>
                      <li class="nav-item"><a class="nav-link " href="{{ Route('user.villaslist') }}">Villas</a></li>
                      <li class="nav-item">
                        @if ($LoggedUserInfo)
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ $LoggedUserInfo->prenom." ".$LoggedUserInfo->nom  }}
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="{{ Route('welcome') }}">North Travel Agency</a></li>
                                <li><a class="dropdown-item" href=""> My wishes</a></li>
                                <li><a class="dropdown-item" href=""> Mes reservations</a></li>
                                <li><a class="dropdown-item" href=""> Mes vols</a></li>
                                <hr>
                                <li><a class="dropdown-item" href="{{ Route('user.profile') }}"> Mon profil</a></li>
                                <li><a class="dropdown-item" href="{{ Route('logout') }}"> Logout</a></li>
                                @if ($LoggedUserInfo->role=='admin')
                                <hr>
                                <li><a class="dropdown-item" href="{{ Route('admin.dashboard') }}">Administration</a></li>
                                @endif
                            </ul>
                          </div>
                        </li>                  
                      @else
                       <li class="nav-item">
                        <a class="nav-link" href="{{ Route('auth.login') }}" id="vols">Login</a>            
                     </li>

                        @endif
                  </ul>
                </div>    
              </div> 
            </nav>
            

            
@yield('content')

                 
    {{-- footer --}}


    <div class="container text-white">
        <hr class="featurette-divider">
        <footer class="py-5">
          <div class="row">
            <div class=" col-sm-3 col-md-3">
              <h5>Experiences</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"> ranked number one in africa of  property agency in 2014  </li>
                <li class="nav-item mb-2">  the famous agency in the africa </li>
                <li class="nav-item mb-2">best agency award from services in 2020</li>
                <li class="nav-item mb-2"> at your service 24h/24h </li>
                <li class="nav-item mb-2"> customer service is a goal , not a duty </li>
              </ul>
            </div>
      
            <div class="col-sm-3 col-md-2">
              <h5>What's more</h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="#iframedyalna" class="nav-link p-0 text-muted">Home</a></li>
                <li class="nav-item mb-2"><a href="./about_us.html" target="_self"  class="nav-link p-0 text-muted">About</a></li>
                <li class="nav-item mb-2"> Private</li>
                <li class="nav-item mb-2">Sevices&activites</li>
                <li class="nav-item mb-2">FAQs</li>
               
              </ul>
            </div>
      
            <div class="col-sm-3 col-md-2">
              <h5>Our partners </h5>
              <ul class="nav flex-column">
                <li class="nav-item mb-2"><a href="https://www.groupebcp.com/fr/Pages/home.aspx" target="_blank" class="nav-link p-0 text-muted">Bank of Afrique</a></li>
                <li class="nav-item mb-2"><a href="http://www.mcdonalds.ma"  target="_blank"  class="nav-link p-0 text-muted">Mcdonald's</a>  </li>
                <li class="nav-item mb-2"><a href="http://www.inwi.ma"  target="_blank"  class="nav-link p-0 text-muted"> Inwi</a></li>
              </ul>
            </div>
      
            <div class="d-none d-md-block col-md-4 offset-1">
              <form>
                <h5>Subscribe to our newsletter</h5>
                <p>Monthly digest of whats new and exciting from us.</p>
                <div class="d-flex w-100 gap-2">
                  <label for="newsletter1" class="visually-hidden">Email address</label>
                  <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
                  <button class="btn btn-primary" type="button">Subscribe</button>
                </div>
              </form>
            </div>
          </div>
      
          <div class="d-flex justify-content-between py-4 my-4 border-top">
            <p>&copy; 2021 Company, Inc. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
              <li class="ms-3"><a class="link-dark" target="_blank" href="https://twitter.com/"><img class="bi" width="24" height="24" src="https://img.icons8.com/color/48/000000/twitter.png"/></a></li>
              <li class="ms-3"><a class="link-dark" target="_blank" href="https://www.instagram.com/?hl=fr"><img class="bi" width="24" height="24" src="https://img.icons8.com/fluency/48/000000/instagram-new.png"/></a></li>
              <li class="ms-3"><a class="link-dark" target="_blank" href="https://fr-fr.facebook.com/"><img class="bi" width="24" height="24"  src="https://img.icons8.com/color/48/000000/facebook.png"/></a></li>
            </ul>
          </div>
        </footer>
      </div>