

<!DOCTYPE html>
<html lang="en">
<style>
  .profileDisplay {
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 20px;
        text-align: left; /* Align text to the left */
        display: inline-block; /* Center the container */
    }

    .profileDisplay h2 {
        margin: 10px 0;
        color: #333;
    }
    .center-container {
        text-align: center;
    }
</style>
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>MoveMate Homepage</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{asset('import/assets/favicon.ico')}}"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>


    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{asset('import/css/styles.css')}}" rel="stylesheet"/>
</head><body id="page-top">
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="#page-top"><img src="{{asset('import/assets/img/compLogo.png')}}" height="400"
                                                      alt="..."/></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <li class="nav-item"><a class="nav-link" href="/#services">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="/#advertisment">Advertisment</a></li>
                <li class="nav-item"><a class="nav-link" href="/#about">About</a></li>
                <li class="nav-item"><a class="nav-link" href="/#team">Team</a></li>
                <li class="nav-item"><a class="nav-link" href="/#contact">Contact</a></li>
                <li class="nav-item">
                    @if(session('user'))
                        <a class="nav-link" href="{{ route("userProfile") }}">My Profile</a>
                    @else
                        <div class="loginBtn">
                            <a class="nav-link" href="{{ route("login") }}">login</a>
                        </div>
                    @endif

{{--                    @guest--}}
{{--                        @if (Route::has('login'))--}}
{{--                            <div class="loginBtn">--}}
{{--                                <a class="nav-link" href="{{ route('login') }}">login</a>--}}
{{--                            </div>--}}
{{--                        @endif--}}
{{--                    @else--}}
{{--                        @auth--}}    
{{--                            <a class="nav-link" href="../profile">My Profile</a>--}}
{{--                        @endauth--}}

{{--                    @endguest--}}
                </li>
                @if(session('user'))
                <li class="nav-item"><a class="nav-link" href="/shipper">Shipper</a></li>
                    <li class="nav-item">
                    
                        <a class="nav-link" href="{{ route("logout") }}">Logout</a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
<!-- Masthead-->
<header class="masthead" style="background-image: url(/import/assets/img/profilebackground.jpg) !important;">
    <div class="container">
    <h1>My Profile</h1>
    </div>
</header>
<div class="center-container">
<div class="profileDisplay">
    <h2>Username : {{ $user->username }}</h2>
    <h2>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $user->email }}</h2>
</div>  
</div>   
</body>
</html>

