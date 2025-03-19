<!DOCTYPE html>
<html>
<head>
    <title>Address Storage Example</title>
    <style>
        #pickupAddress {
            margin-top: 10px;
            position: relative;
        }

        #pickupAddress:hover::after {
            content: attr(data-saved-address);
            position: absolute;
            top: 100%;
            left: 0;
            background: #fff;
            border: 1px solid #ccc;
            padding: 5px;
            display: block;
        }
    </style>
</head>
<body>

    <label for="pickup">Pickup Location:</label>
    <input type="text" id="pickup" name="pickup" placeholder="Address Line 1" oninput="saveAddress(this)">
    <input type="checkbox" id="saveAddressCheckbox"> Save Address

    <script>
        // Function to save address in localStorage when checkbox is checked
        function saveAddress(input) {
            const saveAddressCheckbox = document.getElementById('saveAddressCheckbox');
            
            if (saveAddressCheckbox.checked) {
                const savedAddress = input.value;
                localStorage.setItem('savedAddress', savedAddress);
            }
        }

        // Function to retrieve and display saved address on hover
        window.onload = function() {
            const pickupAddressInput = document.getElementById('pickup');
            const saveAddressCheckbox = document.getElementById('saveAddressCheckbox');

            // Set the saved address on page load
            pickupAddressInput.setAttribute('data-saved-address', localStorage.getItem('savedAddress'));

            // Update the saved address on checkbox change
            saveAddressCheckbox.addEventListener('change', function() {
                pickupAddressInput.setAttribute('data-saved-address', localStorage.getItem('savedAddress'));
            });
        };
    </script>



</body>
</html>
