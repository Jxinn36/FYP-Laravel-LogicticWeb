<!DOCTYPE html>
<html lang="en">


<!-- layouts/admin.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>MoveMate Admin Dashboard</title>

    <!-- Include your CSS file or add styles directly -->
    <link href="{{ asset('import/Admin/css/admin.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>

<style>
    .modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        justify-content: center;
        align-items: center;
    }

    .modal-content {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        text-align: center;
    }
</style>

<body>
    <div class="upper-nav">
        <span style="font-size: 24px; font-weight: bold;">MoveMate Admin Dashboard</span>
    </div>

    <div class="dashboard">
        <div class="sidenav">
        <a href="{{ url('admin') }}">Manage Shipper</a>
            <a href="{{ url('manageAdvertisement') }}">Manage Advertisement</a>
        </div>

    

        <div class="dashboard-content">
            <div class="overview">
                <div class="table-wrap">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr>
                                <th>No.</th>
                                <th>Shipper ID</th>
                                <th>Full Name</th>
                                <th>Mobile Number</th>
                                <th>Order ID</th>
                                <th>Payment ID</th>
                                <th>User ID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php($no = 1 )
                            @foreach ($data as $shipper)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{ $shipper->shipperID}}</td>
                                    <td>{{ $shipper->fullName }}</td>
                                    <td>{{ $shipper->phNum }}</td>
                                    <td>{{ $shipper->orderID }}</td>
                                    <td>{{ $shipper->paymentID }}</td>
                                    <td>{{ $shipper->userID}}</td>
                                   
                                    <td>
            
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $shipper->shipperID }}">Delete</button>
        </td>
      
        <div class="modal fade" id="deleteModal{{ $shipper->shipperID }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel{{ $shipper->shipperID }}" aria-hidden="true">
<div class="modal-dialog" role="document">
<div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel{{ $shipper->shipperID }}">Delete shipper</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>

    <form action="{{ route('shippers.destroy', $shipper->shipperID) }}" method="post">
        @csrf
        @method('DELETE')
        <div class="modal-body">
            <p>Are you sure you want to delete this shipper?</p>
        </div>
        <div class="modal-footer">
            
            <button type="submit" class="btn btn-danger">Delete</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </form>


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
function openConfirmationModal(shipperId) {
document.getElementById('confirmationModal').style.display = 'flex';
document.getElementById('deleteshipperButton').onclick = function() {
    confirmDelete(shipperId);
};
}

function closeConfirmationModal() {
document.getElementById('confirmationModal').style.display = 'none';
}

function confirmDelete(shipperId) {
// Debugging: Check if the form is submitting
console.log('Form submitted for shipper ID:', shipperId);

// Submit the form
document.getElementById('editshipperForm' + shipperId).submit();

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










