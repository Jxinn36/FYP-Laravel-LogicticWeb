@include('carrierLayout')

<style>
    .left-align{
        text-align: left;
    }
    </style>
<!DOCTYPE html>
<html lang="en">
<body>

    <div class="navbar-top">
        <div class="title">
            <h2>Carrier Dashboard Panel</h2>
        </div>

       
        <!-- End -->
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
          
                <li><a href="{{ url('/carrier') }}">
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
                    <i class="uil uil-estate"></i>
                    <span class="link-name" href="#profile">Profile</span>
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
        <div class="table-wrap">
<table class="table">
<thead class="thead-primary">
    @php
        $orderID = request()->segment(3);
    @endphp
<tr>


    <th style="text-align: left;  font-size: 20px;">Details of Order ID : {{ $orderID }}</th>
</tr>
</thead>
<table style="width: 100%; font-size: 20px; color:black;">
<tbody style="text-align:left; ">
   
<tr>
        <td class="title-column" style="width: 30%;">Pick Address</td>
        <td class="title-column">:</td>
        <td class="data-column">{{ $pickAddress }}</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="title-column">Drop Address</td>
        <td class="title-column">:</td>
        <td class="data-column">{{ $dropAddress }}</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
  
    <!-- <tr>
        <td class="title-column">Order Time</td>
        <td class="title-column">:</td>
        <td class="data-column"></td>

   -->
    <tr>
        <td class="title-column">Remark</td>
        <td class="title-column">:</td>
        <td class="data-column">{{ $remark }}</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="title-column">Receiver Phone Number</td>
        <td class="title-column">:</td>
        <td class="data-column">{{ $dropMobile }}</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="title-column">Receiver Name</td>
        <td class="title-column">:</td>
        <td class="data-column">{{ $dropName }}</td>
    </tr>
    <tr>
    <td>&nbsp;</td>
    </tr>

</tbody>
</table>
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

