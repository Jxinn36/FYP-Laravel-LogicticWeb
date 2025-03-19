<!DOCTYPE html>
<html>


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
<!-- <head>
    <title>Shipper Page</title>
   
</head> -->

<body style="margin-top : 15%">

    <div class="container">

          <div class="form-column">
          <form action="{{url('upload')}}" method="POST" id="shipperForm">
          @csrf
<!-- 
 ================= PICK UP ========================================== -->

<div class="address-container" id="pickupContainer">
<label for="pickup">Pickup Location:</label>

<input type="text" id="pickup" name="pickupAddress" placeholder="Address Line 1">
<span class="error" id="pickupError" style="color: red; margin-bottom: 10px;"></span>


    <input type="tel" id="mobile" name="pickMobile" placeholder="Mobile Number" >
    <span class="error" id="mobileError" style="color: red; margin-bottom: 10px;"></span>

    <input type="text" id="contactName" name="pickName" placeholder="Contact Name">
    <span class="error" id="nameError" style="color: red; margin-bottom: 10px;"></span>


    <button type="button" onclick="saveAddress('pickup')">Save Address</button>
    <button type="button" id="save" onclick="openSavedAddressesModal()">View Saved Addresses</button>
</div>

<div id="savedAddressesModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeSavedAddressesModal()">&times;</span>
        <div id="savedAddressesList"></div>
    </div>
</div>




 <!-- ================= MID STOP ========================================== -->
  <div id="midstop-container" name="midStop">
  <span class="error" id="MidStopError" style="color: red; margin-bottom: 10px;"></span>
    </div>
 <button type="button" id="addMidstopBtn" onclick="toggleMidstop()">Add Midstop</button>

            
 <!-- ====================== DROP OF   ========================================== -->
 <div class="address-container" id="dropoffContainer">
    <label for="dropoff">Drop-off Location:</label>
    <input type="text" id="dropoff" name="dropoffAddress" placeholder="Address Line 1">

    <span class="error" id="dropoffError" style="color: red; margin-bottom: 10px;"></span>

    <input type="tel" id="dropoffmobile" name="dropoffMobile" placeholder="Mobile Number">
    <span class="error" id="dmobileError" style="color: red; margin-bottom: 10px;"></span>

    <input type="text" id="dropoffcontactName" name="dropoffName" placeholder="Contact Name">
    <span class="error" id="dnameError" style="color: red; margin-bottom: 10px;"></span>

    <button type="button" onclick="saveAddress('dropoff')">Save Address</button>
</div>


    <br>

 
    <!-- =================================== VEHICLE ============================================ -->
             <label for="vehicle">Choose the type of vehicle:</label>
        <div class="selected-vehicle" id="selectedVehicle"></div>
        
    <div class="vehicle-option" id="lorry" onclick="displaySelectedVehicle('lorry', 'LORRY123')">
            <img class="vehicle-image" src="{{asset('import/Shipper/images/lorry.png')}}" alt="Lorry">
            <div class="vehicle-details">
                <p><strong>Lorry</strong></p>
                <p>Max Weight: 5000 kg</p>
                <p>A large vehicle suitable for heavy loads.</p>
            </div>
        </div>

        <div class="vehicle-option" id="car" onclick="displaySelectedVehicle('car', 'CAR456')">
            <img class="vehicle-image" src="{{asset('import/Shipper/images/car.png')}}" alt="Car">
            <div class="vehicle-details">
                <p><strong>Car</strong></p>
                <p>Max Weight: 1000 kg</p>
                <p>A small vehicle for lighter loads.</p>
            </div>
            
        </div>
        <div id="errorContainer" style="color: red; margin-bottom: 10px;"></div>
        <br><br> 
         <!-- Calculate Total Button -->
         <div>
         <button type="button" id="calculateTotalBtn" onclick="calculateTotal()">Calculate Total</button>
    </div>

<!-- Total Column -->
<div id="total-column" style="display: none;">
    <h3>Total Amount</h3>
    <p id="totalAmount">RM 10</p>

    <button type="button" id="submitBtn" onclick="openWalletModal()">Pay by Wallet</button>
    </div>

    <!-- Wallet Modal -->
<div id="walletModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeWalletModal()">&times;</span>
        <h2><br>Wallet Information</h2>
        <p>Current Balance</p>
        <p>====================</p>
        <p id="walletBalance">Wallet Balance: RM<span id="currentBalance">100.00</span></p>
        <button type="button" onclick="topUp()">Top Up</button><br>
        <button type="button" id="proceedToBookingBtn" onclick="proceedToBooking()">Proceed to Booking</button>
    </div>
    <input type="hidden" name="totalBill" id="totalBillInput" value="">
    <input type="hidden" name="shipperID" id="shipperIDInput" value="">
    
    </div>
   
</body>

            </div>
        </div>
      </div>  
</form>

<!-- =====================================================================================================
====================================================================================================== -->



<script>
        // Retrieve the top-up amount from localStorage
        const topUpAmount = localStorage.getItem('topUpAmount');

        if (topUpAmount) {
            // Clear the stored top-up amount
            localStorage.removeItem('topUpAmount');

            // Update the wallet balance on the shipper page
            const currentBalanceElement = document.getElementById('currentBalance');
            let currentBalance = parseFloat(currentBalanceElement.innerText);
            currentBalance += parseFloat(topUpAmount);
            currentBalanceElement.innerText = currentBalance.toFixed(2);

        }

    </script>


<script>

function validateField(inputId, errorId, errorMessage, validationFunction) {
    const input = document.getElementById(inputId);
    const error = document.getElementById(errorId);

    if (!validationFunction()) {
        error.textContent = errorMessage;
        return false;
    } else {
        error.textContent = '';
        return true; 
    }
}

function validateMidstops() {
    const midstopInputs = document.querySelectorAll('.midstop');
    const midstopError = document.getElementById('MidStopError');

    for (const input of midstopInputs) {
        // Allow only alphabets and allowed symbols (, / ( ))
        const isValidFormat = /^[a-zA-Z0-9(),\/\s\-]+$/.test(input.value) && input.value.length <= 100;

        if (!isValidFormat) {
            midstopError.textContent = 'Invalid Address';
            return false;
        }
    }

    midstopError.textContent = ''; 
    return true; 
}



function addMidstopInput() {
    const input = document.createElement("input");
    input.type = "text";
    input.classList.add("midstop");
    input.name = "midstops[]";
    input.placeholder = `Midstop ${midstopCount}`;
    midstopContainer.appendChild(input);

    // Disable the "Add Midstop" button when the maximum number of midstops is reached
    if (midstopCount === maxMidstops) {
        document.getElementById("addMidstopBtn").disabled = true;
    }

    // Add input event listener for validation
    input.addEventListener("input", function () {
        const isValid = validateMidstop(input.value);
        if (!isValid) {
            input.setCustomValidity("Invalid input. Only alphabets and certain symbols are allowed.");
        } else {
            input.setCustomValidity("");
        }
    });
}



function validatePickup() {
    const pickupValue = document.getElementById("pickup").value;
    const pickupError = document.getElementById('pickupError');

    if (!pickupValue.trim()) {
        pickupError.textContent = 'Address is required';
        return false;
    }

    // Allow only digits in the format xxx-xxxxxxx
    const isValidFormat = /^[a-zA-Z0-9(),\/\s\-]+$/.test(pickupValue) && pickupValue.length <= 60;

    if (!isValidFormat) {
        pickupError.textContent = 'Invalid Address';
    } else {
        pickupError.textContent = ''; // Clear the error message if the format is valid
    }

    return isValidFormat;

}


function validateMobile() {
    const mobileValue = document.getElementById("mobile").value;
    const mobileError = document.getElementById('mobileError');

    // Check if the mobile field is empty
    if (!mobileValue.trim()) {
        mobileError.textContent = 'Mobile number is required';
        return false;
    }

    // Allow only digits in the format xxx-xxxxxxx
    const isValidFormat = /^\d{3}-\d{7}$/.test(mobileValue);

    if (!isValidFormat) {
        mobileError.textContent = 'Invalid mobile number format. Please use the format xxx-xxxxxxx';
    } else {
        mobileError.textContent = ''; // Clear the error message if the format is valid
    }

    return isValidFormat;
}


function validateName() {
    const nameValue = document.getElementById("contactName").value;
    const nameError = document.getElementById('nameError');

    if (!nameValue.trim()) {
        nameError.textContent = 'Name is required.';
        return false;
    }

    // Allow only digits in the format xxx-xxxxxxx
    const isValidFormat = /^[a-zA-Z\s]+$/.test(nameValue) && nameValue.length <= 80;

    if (!isValidFormat) {
        nameError.textContent = 'Only alphabhets allowed';
    } else {
        nameError.textContent = ''; // Clear the error message if the format is valid
    }

    return isValidFormat;

}

function validateDropoff() {
        const dropoffValue = document.getElementById("dropoff").value;
        const dropoffError = document.getElementById('dropoffError');

        if (!dropoffValue.trim()) {
            dropoffError.textContent = 'Address is required';
            return false;
        }

        // Allow only alphabets, commas, and spaces with a maximum length of 150
        const isValidFormat = /^[a-zA-Z0-9(),\/\s\-]+$/.test(dropoffValue) && dropoffValue.length <= 150;

        if (!isValidFormat) {
            dropoffError.textContent = 'Invalid Address';
        } else {
            dropoffError.textContent = ''; // Clear the error message if the format is valid
        }

        return isValidFormat;
    }

    function validateDropoffMobile() {
        const dropoffMobileValue = document.getElementById("dropoffmobile").value;
        const dropoffMobileError = document.getElementById('dmobileError');

        // Check if the mobile field is empty
        if (!dropoffMobileValue.trim()) {
            dropoffMobileError.textContent = 'Mobile number is required';
            return false;
        }

        // Allow only digits in the format xxx-xxxxxxx
        const isValidFormat = /^\d{3}-\d{7}$/.test(dropoffMobileValue);

        if (!isValidFormat) {
            dropoffMobileError.textContent = 'Invalid mobile number format. Please use the format xxx-xxxxxxx';
        } else {
            dropoffMobileError.textContent = ''; // Clear the error message if the format is valid
        }

        return isValidFormat;
    }

    function validateDropoffName() {
        const dropoffNameValue = document.getElementById("dropoffcontactName").value;
        const dropoffNameError = document.getElementById('dnameError');

        if (!dropoffNameValue.trim()) {
            dropoffNameError.textContent = 'Name is required.';
            return false;
        }

        // Allow only alphabets with a maximum length of 80
        const isValidFormat = /^[a-zA-Z\s]+$/.test(dropoffNameValue) && dropoffNameValue.length <= 80;

        if (!isValidFormat) {
            dropoffNameError.textContent = 'Only alphabets allowed';
        } else {
            dropoffNameError.textContent = ''; // Clear the error message if the format is valid
        }

        return isValidFormat;
    }
</script>


<script>
function displaySelectedVehicle(vehicleType, plateNumber) {
    selectedVehicleType = vehicleType;

    // Store selected vehicle information in local storage
    const selectedVehicleInfo = {
        type: vehicleType,
        registrationNumber: plateNumber
    };

    localStorage.setItem('selectedVehicle', JSON.stringify(selectedVehicleInfo));

    console.log('Selected Vehicle Information:', selectedVehicleInfo);

    document.getElementById("selectedVehicle").innerHTML = "";
    const vehicleDetails = document.createElement("p");
    vehicleDetails.innerHTML = `<strong>${vehicleType}</strong>`;
    document.getElementById("selectedVehicle").appendChild(vehicleDetails);
}


        function openWalletModal() {
            var modal = document.getElementById('walletModal');
            modal.style.display = 'flex';
        }

        function closeWalletModal() {
            var modal = document.getElementById('walletModal');
            modal.style.display = 'none';
        }

        
        function topUp() {
        window.location.href = 'Checkout';
    }  
    </script>


<script>



function calculateTotal() {
    // Validate pickup input
    const isPickupValid = validatePickup();


    // Validate mobile input
    const isMobileValid = validateMobile();
    // Validate name input
    const isNameValid = validateName();

    const  isDropoffValid =  validateDropoff();

    const  isDropoffMobileValid =  validateDropoffMobile();

    const isDropoffNameValid = validateDropoffName();

    const isMidstopsValid = validateMidstops();

// Proceed only if all validations pass
if (!(isPickupValid && isMobileValid && isNameValid && isDropoffValid && isDropoffMobileValid && isDropoffNameValid && isMidstopsValid)) {
    return; // Stop execution if there is an error
}

if (!selectedVehicleType) {
        const errorContainer = document.getElementById("errorContainer");
        errorContainer.innerHTML = "Please select a vehicle type before calculating the total.";
        return;
    }

    // Clear any previous error messages
    const errorContainer = document.getElementById("errorContainer");
    errorContainer.innerHTML = "";

       // Your existing code to calculate total
       let basePrice = 10; // Default base price

if (selectedVehicleType === 'car') {
    basePrice = 15;
} else if (selectedVehicleType === 'lorry') {
    basePrice = 100;
}


    let shipperID = '';
    document.getElementById("shipperIDInput").value = shipperID;

    let totalAmount = basePrice;
    document.getElementById("totalBillInput").value = totalAmount;

    document.getElementById("totalAmount").innerText = `RM ${totalAmount}`;

    document.getElementById("total-column").style.display = "block";
}

</script>


<script>

let cancelClicked = false;

// function proceedToBooking() {
//     // Display loading message with cancel button
//     showBufferTime();
//     cancelClicked = false;

//     setTimeout(function () {
//         if (!cancelClicked) {
//             document.getElementById("shipperForm").submit(); 
//         }
//     }, 6000); 
// }


function submitForm() {
    // Add any additional logic if needed before form submission
    document.getElementById("shipperForm").submit();
}

function proceedToBooking() {
    // Display loading message with cancel button
    showBufferTime();
    cancelClicked = false;

    setTimeout(function () {
        if (!cancelClicked) {
            // Retrieve selected vehicle information from local storage
            const selectedVehicleInfo = JSON.parse(localStorage.getItem('selectedVehicle'));

            // Redirect to confirmation page and pass selected vehicle information as query parameters
            window.location.href = `/confirmation?type=${selectedVehicleInfo.type}&registration=${selectedVehicleInfo.registrationNumber}`;
        }
    }, 6000);

    // Call submitForm() after the 6 seconds timeout
    setTimeout(submitForm, 6000);
}

function showBufferTime() {

    var loadingMessage = document.createElement('div');
    loadingMessage.innerHTML = "Finding you a driver. Please wait...";
    loadingMessage.style.position = 'fixed';
    loadingMessage.style.top = '50%';
    loadingMessage.style.left = '50%';
    loadingMessage.style.transform = 'translate(-50%, -50%)';
    loadingMessage.style.background = '#fff';
    loadingMessage.style.padding = '20px';
    loadingMessage.style.borderRadius = '5px';
    loadingMessage.style.boxShadow = '0 0 10px rgba(0, 0, 0, 0.1)';
    loadingMessage.style.zIndex = '9999';

    // Cancel Booking Button
    var cancelBtn = document.createElement('button');
    cancelBtn.innerHTML = "Cancel Booking";
    cancelBtn.id = "cancelBtn"; 
    cancelBtn.onclick = function () {
        cancelClicked = true;
        window.location.href = '/shipper'; 
    };

    loadingMessage.appendChild(cancelBtn);
    document.body.appendChild(loadingMessage);
}

</script>


    <script>
        let midstopCount = 0;
        const maxMidstops = 3; // Maximum number of midstops
        const midstopContainer = document.getElementById("midstop-container");

        function toggleMidstop() {
            if (midstopCount < maxMidstops) {
                midstopCount++;
                addMidstopInput();
            }
        }

        function addMidstopInput() {
            const input = document.createElement("input");
            input.type = "text";
            input.classList.add("midstop");
            input.name = "midstops[]";
            input.placeholder = `Midstop ${midstopCount}`;
            midstopContainer.appendChild(input);

            // Disable the "Add Midstop" button when the maximum number of midstops is reached
            if (midstopCount === maxMidstops) {
                document.getElementById("addMidstopBtn").disabled = true;
            }
        }
    </script>



<script>
 function openSavedAddressesModal() {
        const savedAddresses = JSON.parse(localStorage.getItem("savedAddresses")) || [];

        if (savedAddresses.length === 0) {
            alert("No addresses saved yet.");
            return;
        }

        const addressList = savedAddresses.map((address, index) => {
            return `
                ${index + 1}. ${formatAddress(address)}
                <br><button type="button" class="saveAdd" onclick="editAddress(${index})">Edit</button>
                <button type="button" class="saveAdd" onclick="deleteAddress(${index})">Delete</button>

                <br>
            `;
        }).join("");

        document.getElementById("savedAddressesList").innerHTML = addressList;
        document.getElementById("savedAddressesModal").style.display = "block";
    }

    function closeSavedAddressesModal() {
        document.getElementById("savedAddressesModal").style.display = "none";
    }

    function deleteAddressFromModal(index) {
        deleteAddress(index);
        closeSavedAddressesModal();
    }

        document.addEventListener("DOMContentLoaded", function () {

            loadSavedAddresses();          // Load saved addresses on page load
        });

        function saveAddress() {
    const addressFields = ["pickup", "mobile", "contactName", "dropoff", "dropoffmobile", "dropoffcontactName"];
    const address = {};

    addressFields.forEach(field => {
        address[field] = document.getElementById(field).value;
    });

    let savedAddresses = JSON.parse(localStorage.getItem("savedAddresses")) || [];
    savedAddresses.push(address);
    localStorage.setItem("savedAddresses", JSON.stringify(savedAddresses));

    loadSavedAddresses(); // Load saved addresses on page load
}

    function loadAddressIntoContainer(address) {
    const addressFields = ["pickup", "mobile", "contactName", "dropoff", "dropoffmobile", "dropoffcontactName"];
    addressFields.forEach(field => {
        document.getElementById(field).value = address[field] || "";
    });      
        }

 function loadSavedAddresses() {
     const savedAddressesContainer = document.getElementById("savedAddresses");
    savedAddressesContainer.innerHTML = "";

    const savedAddresses = JSON.parse(localStorage.getItem("savedAddresses")) || [];
    savedAddresses.forEach((address, index) => {
    const addressDiv = document.createElement("div");
    addressDiv.className = "address-container";
    addressDiv.innerHTML = `
            <div>
                 ${formatAddress(address)}
             </div>
            <div class="address-details">
                <button class="edit-button" onclick="editAddress(${index})">Edit</button>
                <button class="delete-button" onclick="deleteAddress(${index})">Delete</button>
             </div>
                `;
                savedAddressesContainer.appendChild(addressDiv);
            });
        }

 function formatAddress(address) {
     const formattedAddress = [];

     if (address.pickup || address.dropoff) {
          formattedAddress.push(address.pickup || address.dropoff);
       }

      if (address.mobile || address.dropoffmobile) {
         formattedAddress.push(address.mobile || address.dropoffmobile);
       }

     if (address.contactName || address.dropoffcontactName) {
         formattedAddress.push(address.contactName || address.dropoffcontactName);
      }

        return formattedAddress.join(", ");
   }

  function editAddress(index) {
    const savedAddresses = JSON.parse(localStorage.getItem("savedAddresses")) || [];
    const address = savedAddresses[index];

    const addressFields =["pickup", "mobile", "contactName", "dropoff", "dropoffmobile", "dropoffcontactName"];
    addressFields.forEach(field => {
         document.getElementById(field).value = address[field] || "";
     });

      // Optionally, you can remove the edited address from the savedAddresses array
      savedAddresses.splice(index, 1);
      localStorage.setItem("savedAddresses", JSON.stringify(savedAddresses));

      closeSavedAddressesModal();
    }

function deleteAddress(index) {
            const savedAddresses = JSON.parse(localStorage.getItem("savedAddresses")) || [];
            savedAddresses.splice(index, 1);
            localStorage.setItem("savedAddresses", JSON.stringify(savedAddresses));
            closeSavedAddressesModal();
        }

        
    </script>

</body>
</html>