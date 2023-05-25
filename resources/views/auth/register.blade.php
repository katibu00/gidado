<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Create an Account - DataLink</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <div class="text-center mb-3">
                                        <a href="#"><img src="images/logo-full.png" alt="DataLink Logo"></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign up for an account</h4>
                                    <form action="{{ route('register') }}" method="POST" id="registration-form">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Full Name</strong><span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="name" id="full-name" placeholder="Enter your full name">
                                            @error('full_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Phone Number</strong><span class="text-danger"> *</span></label>
                                            <input type="text" class="form-control" name="phone" id="phone-number" placeholder="Enter your phone number">
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email</strong> <span class="text-muted">(optional)</span></label>
                                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Referral Code</strong> <span class="text-muted">(optional)</span></label>
                                            <input type="text" class="form-control" name="referral_code" placeholder="Enter referral code">
                                        </div>
                                        <div class="text-center mt-4">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Already have an account? <a class="text-white" href="{{ route('login') }}">Sign in</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
    Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="js/global.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>
    <script src="js/deznav-init.js"></script>
    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    
    <!-- Custom script for form validation -->
    <script>
        // Function to validate the form
        function validateForm() {
            var fullName = document.getElementById("full-name").value.trim();
            var phoneNumber = document.getElementById("phone-number").value.trim();
            var email = document.getElementById("email").value.trim();
            
            // Check if full name or phone number is empty
            if (fullName === "" || phoneNumber === "") {
                showToast("Please fill in all required fields.");
                return false;
            }
            
            // Check if email is entered but not valid
            if (email !== "" && !validateEmail(email)) {
                showToast("Please enter a valid email address.");
                return false;
            }
            
            // Check if phone number is not a valid 11-digit Nigerian number
            if (!validateNigerianPhoneNumber(phoneNumber)) {
                showToast("Please enter a valid 11-digit Nigerian phone number.");
                return false;
            }
            
            // Form is valid, continue with submission
            return true;
        }
        
        // Function to display a warning toast message
        function showToast(message) {
            toastr.warning(message, "Warning");
        }
        
        // Function to validate email address
        function validateEmail(email) {
            // Regular expression for email validation
            var emailRegex = /^[\w-]+(\.[\w-]+)*@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*(\.[a-zA-Z]{2,})$/;
            
            return emailRegex.test(email);
        }
        
        // Function to validate Nigerian phone number (11 digits)
        function validateNigerianPhoneNumber(phoneNumber) {
            // Regular expression for Nigerian phone number validation
            var phoneRegex = /^(?:(\+|0{0,2})234)?(0)?[789]\d{9}$/;
            
            return phoneRegex.test(phoneNumber);
        }
        
        // Attach form submit event listener
        document.getElementById("registration-form").addEventListener("submit", function(event) {
            event.preventDefault(); // Prevent form submission
            
            if (validateForm()) {
                // Form is valid, proceed with submission
                this.submit();
            }
        });
    </script>
</body>
</html>
