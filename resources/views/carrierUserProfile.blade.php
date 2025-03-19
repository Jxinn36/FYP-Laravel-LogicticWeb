@include('carrierLayout')
<style>
    .left-align{
        text-align: left;
    }
    </style>
<!DOCTYPE html>
<html lang="en">
<!-- Include jQuery library -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<!-- Include jQuery Validation plugin -->
<script src="https://cdn.jsdelivr.net/jquery.validation/1.19.3/jquery.validate.min.js"></script>
<!-- Include Toastr CSS -->
<link rel="stylesheet" href="{{ asset('vendor/toastr/toastr.min.css') }}">

<!-- Include Toastr JS -->
<script src="{{ asset('vendor/toastr/toastr.min.js') }}"></script>

<body>

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
                    <i class="uil uil-user"></i>
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

<tr>


    <th style="text-align: left;  font-size: 20px;">User Profile </th>
</tr>
</thead>
<tbody>
<td class="left-align">

<h2>Username : {{ $user->username }}</h2>
    <h2>Email &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;: {{ $user->email }}</h2>

<!-- <button id="updatePasswordBtn" type="button" >Change Password</button>

<div id="updatePasswordForm" style="display: none;">
    <form method="post" action="{{ route('update.password') }}">
        @csrf
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password" required>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" required>

        <label for="new_password_confirmation">Confirm New Password:</label>
        <input type="password" name="new_password_confirmation" required>

        <button type="submit">Submit</button>
    </form> -->
</div>
</td>

</tbody>
</table>

       
    </div>
    <!-- End -->
    <script>
    $(document).ready(function () {
    $("#updatePasswordBtn").click(function () {
        $("#updatePasswordForm").show();
    });
});

$(document).ready(function () {
    $("#updatePasswordForm").validate({
        ignore: '.ignore',
        errorClass: 'invalid',
        validClass: 'success',
        rules: {
            old_password: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            new_password: {
                required: true,
                minlength: 6,
                maxlength: 50
            },
            new_password_confirmation: {
                required: true,
                equalTo: '#new_password'
            },
        },
        messages: {
            old_password: {
                required: "Enter your old password",
            },
            new_password: {
                required: "Enter your new password",
            },
            new_password_confirmation: {
                required: "Enter your confirm new password",
                equalTo: "Passwords do not match"
            },
        },
        submitHandler: function (form) {
            // Show a loading overlay (if you have a plugin for that)
            //$(form).LoadingOverlay("show");
            form.submit();
        }
    });
});

</script>
</body>
</html>
