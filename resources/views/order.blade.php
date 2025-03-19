<!DOCTYPE html>
<html>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=YOUR_API_KEY"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<link href="{{asset('import/Shipper/css/shipper.css')}}" rel="stylesheet" />
<head>
    <title>Shipper Page</title>
   
</head>
<body>

    <nav>
  <ul>
    <li>
      <a href="#">Track</a>
    </li>
    <li>
      <a href="#">History</a>
    </li>
    <li>
      <a href="#">Profile</a>
    </li>
  </ul>
</nav>

    <div class="container">
  
          <div class="form-column">
          <form action="{{url('upload')}}" method="POST">
          @csrf
<!-- 
          ================= PICK UP ========================================== -->
            <label for="origin">Pickup Location:</label>
             <input type="text" id="pickup" name="pickup" placeholder="Address Line 1 ">
             <input type="text" id="pickup2" name="pickup" placeholder="Address Line 2 (Optional)">

            <div class="address-details">
            
                <input type="text" id="unit" name="unit" placeholder="floor / unit number">
                
                <input type="tel" id="mobile" name="pickMobile"  placeholder="mobile number" >
             
                <input type="text" id="contactName" name="pickName" placeholder="contact name">
               
               <label class="checkbox-label">
                  <input type="checkbox"  id="saveAddress"  class="checkbox-input">
                         Save Address
                   </label>

                   
                   <script>
document.addEventListener("DOMContentLoaded", function () {
    const pickupInput = document.getElementById("pickup");
    const saveAddressCheckbox = document.getElementById("saveAddress");

    // Load saved address from localStorage on page load
    const savedAddress = localStorage.getItem("savedAddress");

    console.log("Saved Address:", savedAddress);

    if (savedAddress) {
        pickupInput.value = savedAddress;
        saveAddressCheckbox.checked = true;
    }

    // Save address to localStorage when the checkbox is checked
    saveAddressCheckbox.addEventListener("change", function () {
        if (saveAddressCheckbox.checked) {
            localStorage.setItem("savedAddress", pickupInput.value);
        } else {
            localStorage.removeItem("savedAddress");
        }

        console.log("Saved Address Checkbox Checked:", saveAddressCheckbox.checked);
    });

    // Display saved address on hover
    pickupInput.addEventListener("mouseover", function () {
        if (saveAddressCheckbox.checked) {
            const title = localStorage.getItem("savedAddress");
            pickupInput.setAttribute("title", title);
            console.log("Title on Hover:", title);
        }
    });
});







     


        


        











  
  


</body>
</html>
