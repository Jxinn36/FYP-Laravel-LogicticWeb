
@include('carrierLayout')

    <!DOCTYPE html>
<html lang="en">
<body>
@if(session('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
@endif
<div class="navbar-top">
    <div class="title">
        <h2>Carrier Dashboard Panel</h2>
    </div>
</div>
<!-- End -->

<!-- Sidenav -->
<div class="sidenav">
    <nav>
        <div class="logo-name">
            <div class="logo-image">
                <img style="width: 100%; height: auto;" src="{{asset('import/assets/img/compLogo.png')}}" alt="">
            </div>
            <!--=== <span class="logo_name">Carrier Dashboard</span>==-->
        </div>
        <div class="menu-items">
            <ul class="nav-links">

                <li><a href="#">
                        <i class="uil uil-estate"></i>
                        <span class="link-name">Dahsboard</span>
                    </a></li>
                <li><a href="{{ url('/carrierJobAcceptance') }}">
                        <i class="uil uil-files-landscapes"></i>
                        <span class="link-name">Job Acceptance</span>
                    </a></li>
            </ul>

            <ul class="logout-mode">

                <li><a href="{{ url('/carrierUserProfile') }}">
                        <i class="uil uil-user"></i>
                        <span class="link-name">Profile</span>
                    </a></li>
                    <li><a href="{{ route("logout") }}">
                        <i class="uil uil-signout"></i>
                        <span class="link-name">Logout</span>
                    </a></li>

            </ul>
        </div>
    </nav>
</div>
<!-- End -->

<!-- Main -->


<div class="main">

    <h2 class="mainH2">Pick Your Job Here</h2>
    <div class="table-wrap">
        <table class="table">
            <thead class="thead-primary">
            <tr>
                <th>No.</th>
                <th>Order ID</th>
                <th>Parcel Size</th>
                <th>Pick Up Address</th>
                <th>Drop Off Address</th>
                <th>Job Accpectance</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($orders as $key =>$orderList)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td> {{$orderList['orderID']}}</td>
                    <td> {{$orderList['parcelSize']}}</td>
                    <td> {{$orderList['pickAddress']}} </td>
                    <td> {{$orderList['dropAddress']}}</td>
                    <td>
                    <form method="POST" action="{{ route('accept.job') }}">
                            @csrf
                            <input type="hidden" name="orderID" value="{{ $orderList['orderID'] }}">
                            <button type="submit" class="btn btn-primary"
                                    onclick="confirmAccept({{ $orderList['orderID'] }})">Accept
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>

</div>
<!-- End -->

<script src="{{asset('import/js/carrierJquery.min.js')}}"></script>
<script src="{{asset('import/js/carrierPopper.js')}}"></script>
<script src="{{asset('import/js/carrierBootstrap.min.js')}}"></script>
<script src="{{asset('import/js/carrierMain.js')}}"></script>
<script src="{{asset('import/newCarrier/js/script.js')}}"></script>

<script>
    function confirmAccept(orderID) {
        var confirmation = confirm("Are you sure you want to accept the order with ID: " + orderID + "?");

        if (confirmation) {
            // Here you can add logic to handle the acceptance of the order.
            // For example, you might make an AJAX request to the server.
            // You can redirect to another page or perform any other action.
            alert("Order accepted: " + orderID);
        } else {
            // The user clicked "Cancel" in the confirmation dialog.
            alert("Order acceptance canceled");
        }
    }
</script>
</body>
</html>


