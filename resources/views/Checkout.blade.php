<!DOCTYPE html>
<html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="{{asset('import/Checkout/checkout.css')}}" rel="stylesheet" />

<div class="container p-0">
    <div class="card px-4">
        <p class="h8 py-3">Payment Details</p><br><br>
        <div class="row gx-3">
        <div id="errorMessages" class="mb-3" style="color: red;"></div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Top Up Amount</p>
                    <input class="form-control mb-3" id="topUpAmount" type="text" placeholder="RM20.00">
                    <span class="error-message" id="topUpAmountError" style="color: red;"></span>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Card Number</p>
                    <input class="form-control mb-3" id="cardNumber" type="text" placeholder="xxxx xxxx xxxx xxxx">
                    <span class="error-message" id="cardNumberError" style="color: red;"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">Expiry</p>
                    <input class="form-control mb-3" id="expiry" type="text" placeholder="MM/YY">
                    <span class="error-message" id="expiryError" style="color: red;"></span>
                </div>
            </div>
            <div class="col-6">
                <div class="d-flex flex-column">
                    <p class="text mb-1">CVV/CVC</p>
                    <input class="form-control mb-3 pt-2 " id="cvv" type="password" placeholder="***">
                    <span class="error-message" id="cvvError" style="color: red;"></span>
                </div>
            </div>
            <div class="col-12">
            <button type="button" class="btn-top-up mb-3" onclick=" proceedToTopUp()">
    <span class="ps-3">Top Up</span>
    <span class="fas fa-arrow-right"></span>
</button>

                <!-- <div id="topUpSuccessModal" class="modal">
                    <div class="modal-content">
                        <h2>Top-up Successful</h2><br>
                        <p>Your account has been successfully topped up.</p><br>
                        <button type="button" class="btn-back" onclick="goBack()">Back</button>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>


<script>

    // function goBack() {
    //     history.back();
    // }

    // function openTopUpSuccessModal() {
    //     var modal = document.getElementById('topUpSuccessModal');
    //     modal.style.display = 'flex';
    // }

    // function closeTopUpSuccessModal() {
    //     var modal = document.getElementById('topUpSuccessModal');
    //     modal.style.display = 'none';
    // }

    function displayErrorMessages(messages) {
        const errorMessagesElement = document.getElementById('errorMessages');
        errorMessagesElement.innerHTML = messages.join('<br>');
    }

    function clearErrorMessages() {
        displayErrorMessages([]);
    }

    function validateForm() {
        // Clear all previous error messages
        clearErrorMessages();

        // Validate Top Up Amount
        const topUpAmount = document.getElementById('topUpAmount').value.trim();
        const cardNumber = document.getElementById('cardNumber').value.trim();
        const expiry = document.getElementById('expiry').value.trim();
        const cvv = document.getElementById('cvv').value.trim();

        const errors = [];

        if (!topUpAmount || isNaN(parseFloat(topUpAmount))) {
            errors.push('Please enter a valid top-up amount.');
        }

        if (!cardNumber || !/^\d{4} \d{4} \d{4} \d{4}$/.test(cardNumber)) {
            errors.push('Please enter a valid card number (e.g., 1234 5678 4356 7890).');
        }

        if (!expiry || !/^\d{2}\/\d{2}$/.test(expiry)) {
            errors.push('Please enter a valid expiry date (e.g., MM/YY).');
        }

        if (!cvv || !/^\d{3}$/.test(cvv)) {
            errors.push('Please enter a valid CVV/CVC (e.g., 123).');
        }

        // Display all error messages at the top of the page
        if (errors.length > 0) {
            displayErrorMessages(errors);
            return false;
        }

        // If all validations pass, proceed with top-up
        return true;
    }

    function proceedToTopUp() {
        // Call the validateForm function
        if (validateForm()) {
            const topUpAmount = document.getElementById('topUpAmount').value.trim();

            // Store the top-up amount in localStorage
            localStorage.setItem('topUpAmount', topUpAmount);

            // Navigate to the shipper page
            window.location.href = 'shipper';

        }

    }
    
</script>

    </body>

    <div id="walletModal" class="modal">
    <div class="modal-content">
        <span class="close-btn" onclick="closeWalletModal()">&times;</span>
        <h2><br>Wallet Information</h2>
        <p>Current Balance</p>
        <p>====================</p>
        <p id="walletBalance">Current Wallet Balance: RM<span id="currentBalance">100.00</span></p>
        <button type="button" id="proceedToBookingBtn" onclick="proceedToBooking()">Proceed to Booking</button>
    </div>
    <input type="hidden" name="totalBill" id="totalBillInput" value="">
    <input type="hidden" name="shipperID" id="shipperIDInput" value="">
    
    </div>

