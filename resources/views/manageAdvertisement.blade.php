<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MoveMate Admin Dashboard</title>

    <!-- Include your CSS file or add styles directly -->
    <link href="{{ asset('import/Admin/css/admin.css') }}" rel="stylesheet"/>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <!-- In your <head> section -->


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
        <h2>Manage Advertisements</h2>

        <a href="{{ url('advertisements/create') }}" class="btn btn-primary">Create Advertisement</a>
        <div class="table-wrap">
            <table class="table">
                <thead class="thead-primary">
                <tr>
{{--                    <th>No</th>--}}
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Company</th>
                    <th>Registration No</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                {{--                @php($no = 1)--}}
                @foreach ($data as  $advertisement)
                    <tr>
                        {{--                        <td>{{$no++}}</td>--}}
                        <td>{{ $advertisement->advID }}</td>
                        <td>{{ $advertisement->advName }}</td>
                        <td>{{ $advertisement->advDesc }}</td>
                        <td>
                            <img src="{{ asset('images/advertisements/' . $advertisement->advImg) }}"
                                 style="max-width: 100px;">
                        </td>
                        <td>{{ $advertisement->advCompany }}</td>
                        <td>{{ $advertisement->companyRegisNo }}</td>
                        <td>
                            <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal{{ $advertisement->advID }}">Delete
                            </button>
                        </td>

                        <td>
                            <div class="modal fade" id="deleteModal{{ $advertisement->advID }}" tabindex="-1"
                                 role="dialog"
                                 aria-labelledby="deleteModalLabel{{ $advertisement->advID }}" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="deleteModalLabel{{ $advertisement->advID }}">
                                                Delete
                                                Advertisement</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>

                                        <form action="{{ route('advertisements.destroy', $advertisement->advID) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this advertisement?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </td>

                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

</body>

</html>

<script>
    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</script>


<script>
    function openConfirmationModal(advertisementId) {
        document.getElementById('confirmationModal').style.display = 'flex';
        document.getElementById('deleteAdvertisementButton').onclick = function () {
            confirmDelete(advertisementId);
        };
    }

    function closeConfirmationModal() {
        document.getElementById('confirmationModal').style.display = 'none';
    }

    function confirmDelete(advertisementId) {
        // Debugging: Check if the form is submitting
        console.log('Form submitted for advertisement ID:', advertisementId);

        // Submit the form
        document.getElementById('editAdvertisementForm' + advertisementId).submit();

        // Close the confirmation modal
        closeConfirmationModal();
    }


</script>


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