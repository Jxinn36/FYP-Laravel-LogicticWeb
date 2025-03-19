
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

<style>
.form-gap {
    padding-top: 160px;
}
</style>

<!-- Session Status  -->
<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>No problem. You can reset your password here.</p>
                  <div class="panel-body">
    
                    <form id="register-form" role="form"  action="{{ route('password.email') }}" autocomplete="off" class="form" method="post" onsubmit="return validateForm()">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input id="email" name="email" id="email" placeholder="email address" class="form-control"  type="text">  
                        </div>
                        <span class="error-message" id="email-error"  style="color: red;"></span>
                      </div>
                      <div class="form-group">
                        <input name="recover-submit" class="btn btn-lg btn-primary btn-block" style="background: #e3b04b !important" value="Reset Password" type="submit">
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>




<script>
function validateForm() {
    var email = document.getElementById('email').value;
    var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    var isValid = true;

  
    if (email === "") {
            document.getElementById('email-error').innerText = "Please enter your Email.";
            isValid = false;
        } else if (!/@/.test(email) || !/.com/.test(email)) {
            document.getElementById('email-error').innerText = "Invalid email format. Email must contain '@' and '.com'.";
            isValid = false;
        } else {
            document.getElementById('email-error').innerText = "";
        }

    return isValid;
}
</script>
