<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="utf-8">
    <meta name="keywords" content>
    <meta name="author" content>
    <meta name="robots" content>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Mophy - Payment Codeigniter Admin Dashboard">
    <meta property="og:title" content="Mophy - Payment Codeigniter Admin Dashboard">
    <meta property="og:description" content="Mophy - Payment Codeigniter Admin Dashboard">
    <meta property="og:image" content="images/social-image.png">
    <meta name="format-detection" content="telephone=no">
    <title>Login - DataLink</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link href="css/bootstrap-select.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                                        <a href="#"><img src="images/logo-fulla.png" alt="DataLink Logo"></a>
                                    </div>
                                    <h4 class="text-center mb-4 text-white">Sign in to your account</h4>
                                    @if(Session::has('error_message'))
                                        <div class="alert alert-danger">
                                            {{ Session::get('error_message') }}
                                        </div>
                                    @endif

                                    <form action="{{ route('login') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email or Phone</strong></label>
                                            <input type="text" class="form-control" name="email_or_phone" id="email_or_phone" placeholder="Enter your email or phone">
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password</strong></label>
                                            <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="custom-control custom-checkbox ms-1 text-white">
                                                    <input type="checkbox" class="form-check-input" name="remember" id="remember">
                                                    <label class="custom-control-label" for="remember">Keep me Logged In</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a class="text-white" href="#">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="{{ route('register') }}">Sign up</a></p>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<!-- Include the following script after the form -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
      // Get the form element
      const form = document.querySelector('form');
  
      // Add event listener for form submission
      form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting
  
        // Validate the form inputs
        const emailOrPhoneInput = document.getElementById('email_or_phone');
        const passwordInput = document.getElementById('password');
  
        // Reset validation errors
        emailOrPhoneInput.classList.remove('is-invalid');
        passwordInput.classList.remove('is-invalid');
        toastr.clear();
  
        // Validate email or phone
        const emailOrPhoneValue = emailOrPhoneInput.value.trim();
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const phoneRegex = /^(?:\+?234|0)?[789]\d{9}$/; // Nigerian phone number format
        if (!(emailRegex.test(emailOrPhoneValue) || phoneRegex.test(emailOrPhoneValue))) {
          emailOrPhoneInput.classList.add('is-invalid');
          toastr.error('Please enter a valid email or a valid 11-digit Nigerian phone number.');
          return; // Stop form submission
        }
  
        // Validate password
        const passwordValue = passwordInput.value.trim();
        if (!passwordValue) {
          passwordInput.classList.add('is-invalid');
          toastr.error('Please enter a password.');
          return; // Stop form submission
        }
  
        // Form is valid, submit the form
        form.submit();
      });
    });
  </script>
  
  
  
  
  
</body>
</html>
