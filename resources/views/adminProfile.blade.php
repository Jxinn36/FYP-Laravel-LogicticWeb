<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MoveMate Admin Dashboard</title>

    <!-- Include your CSS file or add styles directly -->
    <link href="{{asset('import/Admin/css/admin.css')}}" rel="stylesheet" /> 


 
</head>

<body>
    <div class="upper-nav">
        <span style="font-size: 24px; font-weight: bold;">MoveMate Admin Dashboard</span>
    </div>

    <div class="dashboard">
        <div class="sidenav">
        <a href="{{ url('admin') }}">Manage Shipper</a>
            <a href="{{ url('manageAdvertisement') }}">Manage Advertisement</a>
            <a href="{{ route('adminProfile') }}">Profile</a>
            <a href="{{ route('logout') }}">Logout</a>
            
        </div>
        <div class="dashboard-content">
            <div class="overview">
                <div class="table-wrap">
                <div id="page-top">

<h1>Username : {{ $user->username }}</h1>
<h1>Email &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: {{ $user->email }}</h1>
</div>
                </div>

            </div>
        </div>
    </div>
</body>
</html>

