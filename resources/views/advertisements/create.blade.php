<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MoveMate Admin Dashboard</title>

    <!-- Include your CSS file or add styles directly -->
    <link href="{{ asset('import/Admin/css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            height: 100vh;
        }

        .upper-nav {
            background-color: #2c3e50;
            color: #ecf0f1;
            padding: 31px;
            text-align: center;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            flex-shrink: 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .dashboard {
            display: flex;
            flex-grow: 1;
            margin-top: 90px; /* Adjusted margin to accommodate the fixed upper-nav */
        }

        .sidenav {
            height: 100%;
            width: 160px;
            position: fixed;
            z-index: 1;
            left: 0;
            background-color: #2c3e50;
            overflow-x: hidden;
            padding-top: 20px;
            top: 90px; /* Adjusted top to accommodate the fixed upper-nav */
        }

        .sidenav a {
            padding: 30px 20px 30px 10px;
            text-decoration: none;
            font-size: 16px;
            color: white;
            display: block;
            text-align: center;
            transition: background-color 0.3s ease;
        }

        .sidenav a:hover {
            color: black;
            background-color: lightcyan;
        }

        .dashboard-content {
            flex: 1;
            padding: 20px;
            margin-left: 160px;
        }

        form {
            max-width: 900px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            background-color: #e74c3c;
            color: #ecf0f1;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #c0392b;
        }
    </style>
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
            <h2>Create Advertisement</h2>

            <form action="{{ route('advertisements.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <label for="advName">Advertisement Name:</label>
                <input type="text" name="advName" required>

                <label for="advDesc">Advertisement Description:</label>
                <textarea name="advDesc" required></textarea>

                <label for="advImg">Advertisement Image:</label>
                <input type="file" name="advImg" accept="image/*" required>

                <label for="advCompany">Company:</label>
                <input type="text" name="advCompany" required>

                <label for="companyRegisNo">Company Registration No:</label>
                <input type="text" name="companyRegisNo" required>

                <button type="submit" >Upload Advertisement</button>
            </form>
        </div>
    </div>


<script>
        // Function to show success message in a modal
        document.addEventListener("DOMContentLoaded", function () {
            // Check for the success message in the session
            var successMessage = '{{ session('success') }}';

            // If a success message exists, show it in a modal
            if (successMessage) {
                // Create a Bootstrap modal
                var modal = `
                    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="successModalLabel">Success!</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ${successMessage}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // Append the modal to the body
                document.body.innerHTML += modal;

                // Show the modal
                $('#successModal').modal('show');
            }
        });
    </script>
</body>





</html>
