<!DOCTYPE html>
<html lang="en">

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

<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=YOUR_API_KEY"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

 <link href="{{asset('import/Shipper/shipper.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link href="{{asset('import/Checkout/confirmation.css')}}" rel="stylesheet" />
</head>
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
        
                {{--<a class="nav-link" href="{{ route('shipper') }}">Shipper</a> --}}
        
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

<body style="margin-top: 20%">

<div class="container" >
<div id="pickupInfo"></div>
<div id="dropoffInfo"></div>

    <div class="confirmation-container">
        <h1><i class="fas fa-check-circle icon"></i> Booking Confirmation</h1>

        <div id="vehicleInfoContainer">
            <strong><i class="fas fa-car icon"></i> WE HAVE FOUND YOU A DRIVER !!!</strong>
            <div id="nameContainer"></div>
            <div id="vehicleTypeContainer"></div>
            <div id="vehiclePlateContainer"></div>
        </div>

        <div id="pickupContainer"></div>
        <div id="dropoffContainer"></div>

        <div id="progressBar">
            <div class="progress-step"></div>
            <div class="progress-label"><i class="fas fa-check icon"></i> Accepted Order</div>
            <div class="progress-step"></div>
            <div class="progress-label"><i class="fas fa-truck icon"></i> Order Picked</div>
            <div class="progress-step"></div>
            <div class="progress-label"><i class="fas fa-gift icon"></i> Delivered</div>
        </div>
    </div>
</div>
  
 <script>
        // Combine both sections into a single DOMContentLoaded event listener
        document.addEventListener("DOMContentLoaded", function () {
            // Retrieve selected vehicle information from local storage
            const selectedVehicleInfo = JSON.parse(localStorage.getItem('selectedVehicle'));

            // Display the vehicle plate number on the confirmation page
            if (selectedVehicleInfo) {
                const nameContainer = document.getElementById('nameContainer');
                const vehicleTypeContainer = document.getElementById('vehicleTypeContainer');
                const vehiclePlateContainer = document.getElementById('vehiclePlateContainer');

                nameContainer.innerHTML = `<i class="fas fa-user icon"></i> Driver Name: ${selectedVehicleInfo.name || 'John Doe'}`;
                vehicleTypeContainer.innerHTML = `<i class="fas fa-car icon"></i> Vehicle Type: ${selectedVehicleInfo.type || 'Car'}`;
                vehiclePlateContainer.innerHTML = `<i class="fas fa-car icon"></i> Vehicle Plate Number: ${selectedVehicleInfo.registrationNumber || 'ABCD123'}`;
            }

            // Retrieve query parameters
            const urlParams = new URLSearchParams(window.location.search);
            const vehicleType = urlParams.get('type');
            const vehicleRegistration = urlParams.get('registration');
        });

    </script>


</body>
</html>



























<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation Page</title>
</head>
<body>
    <h1>Booking Confirmation</h1>

    <div>
    <div id="vehiclePlateContainer">
    <strong>Vehicle Plate Number: </strong><span id="vehiclePlateNumber"></span>
</div>

    <script>
      // Add this script section to your confirmation.js file
document.addEventListener("DOMContentLoaded", function () {
    // Retrieve selected vehicle information from local storage
    const selectedVehicleInfo = JSON.parse(localStorage.getItem('selectedVehicle'));

    // Display the vehicle plate number on the confirmation page
    if (selectedVehicleInfo) {
        const vehiclePlateContainer = document.getElementById('vehiclePlateNumber');
        vehiclePlateContainer.innerText = selectedVehicleInfo.registrationNumber;
    }
});





    </script>
</body>
</html> -->
