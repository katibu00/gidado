<!doctype html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="generator" content="">
    <title>ExpressData - Mobile Data</title>

    <!-- manifest meta -->
    <meta name="apple-mobile-web-app-capable" content="yes">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="img/favicon180.png" sizes="180x180">
    <link rel="icon" href="img/favicon32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="img/favicon16.png" sizes="16x16" type="image/png">

    <!-- Material icons-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

    <!-- swiper CSS -->
    <link href="/theme/vendor/swiper/css/swiper.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/theme/css/style.css" rel="stylesheet" id="style">

</head>

<body class="body-scroll d-flex flex-column h-100 menu-overlay">
    <!-- screen loader -->
    <div class="container-fluid h-100 loader-display">
        <div class="row h-100">
            <div class="align-self-center col">
                <div class="logo-loading">
                    <div class="icon icon-100 mb-4 rounded-circle">
                        <img src="img/favicon144.png" alt="" class="w-100">
                    </div>
                    <h4 class="text-default">ExpressData</h4>
                    <p class="text-secondary">Best Data company</p>
                    <div class="loader-ellipsis">
                        <div></div>
                        <div></div>
                        <div></div>
                        <div></div>
                    </div>
                </div>
            </div>
        </div>
    </div>




    <!-- Begin page content -->
    <form id="register-form">
        @csrf
    <main class="flex-shrink-0 main has-footer">
        <!-- Fixed navbar -->
        <header class="header">
            <div class="row">
                <div class="col-auto px-0">
                    <button class="menu-btn btn btn-40 btn-link back-btn" type="button">
                        <span class="material-icons">keyboard_arrow_left</span>
                    </button>
                </div>
                <div class="text-left col align-self-center">

                </div>
                <div class="ml-auto col-auto align-self-center">
                    <a href="{{ route('login') }}" class="text-white">
                        Login
                    </a>
                </div>
            </div>
        </header>


        <div class="container h-100 text-white">
            <div class="row h-100">
                <div class="col-12 align-self-center mb-4">
                    <div class="row justify-content-center">
                        <div class="col-11 col-sm-7 col-md-6 col-lg-5 col-xl-4">
                            <h2 class="font-weight-normal mb-5">Create new<br>account with us</h2>
                            <div class="form-group float-label active">
                                <input type="text" class="form-control text-white" name="name" id="name">
                                <label class="form-control-label text-white" for="name">Name</label>
                            </div>
                            <div class="form-group float-label active">
                                <input type="tel" class="form-control text-white" name="phone" id="phone">
                                <label class="form-control-label text-white" for="phone">Phone Number</label>
                            </div>
                            <div class="form-group float-label position-relative">
                                <input type="email" class="form-control text-white" name="email" id="email">
                                <label class="form-control-label text-white" for="email">Email</label>
                            </div>
                            <div class="form-group float-label position-relative input-group">
                                <input type="password" class="form-control text-white" id="password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text password-toggle" onclick="togglePasswordVisibility()">
                                        <i class="material-icons">visibility_off</i>
                                    </span>
                                </div>
                                <label class="form-control-label text-white">Password</label>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- footer-->
    <div class="footer no-bg-shadow py-3">
        <div class="row justify-content-center">
            <div class="col">
                <button type="submit" class="btn btn-default rounded btn-block">Register</button>
            </div>
        </div>
    </div>
</form>


    <!-- Required jquery and libraries -->
    <script src="/theme/js/jquery-3.3.1.min.js"></script>
    <script src="/theme/js/popper.min.js"></script>
    <script src="/theme/vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- cookie js -->
    <script src="/theme/js/jquery.cookie.js"></script>

    <!-- Swiper slider  js-->
    <script src="/theme/vendor/swiper/js/swiper.min.js"></script>

    <!-- Customized jquery file  -->
    <script src="/theme/js/main.js"></script>
    <script src="/theme/js/color-scheme-demo.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- page level custom script -->
    <script src="/theme/js/app.js"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password");
            var passwordToggle = document.querySelector(".password-toggle i");
            
            if (passwordField.type === "password") {
                passwordField.type = "text";
                passwordToggle.textContent = "visibility";
            } else {
                passwordField.type = "password";
                passwordToggle.textContent = "visibility_off";
            }
        }
    </script>



<script>
    $(document).ready(function() {
        $('#register-form').submit(function(event) {
            event.preventDefault();
            var submitButton = $(this).find('button[type="submit"]');
            submitButton.prop('disabled', true).html(
                '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Please Wait...'
            );

            var formData = new FormData(this);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: '/register',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    submitButton.prop('disabled', false).text('Login');

                    if (response.message) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success',
                            text: response.message
                        }).then(() => {
                            window.location.href = '/login';
                        });
                    }
                },
                error: function(xhr, status, error) {
                    submitButton.prop('disabled', false).text('Login');

                    var response = xhr.responseJSON;
                    if (response && response.errors) {
                        var errorMessage = '';
                        $.each(response.errors, function(field, messages) {
                            errorMessage += messages[0] + '\n';
                        });
                        Swal.fire({
                            icon: 'warning',
                            title: 'Validation Error',
                            text: errorMessage
                        });
                    } else if (response && response.error) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: response.error
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'An error occurred. Please try again.'
                        });
                    }
                }
            });
        });
    });
</script>


    

</body>

</html>
