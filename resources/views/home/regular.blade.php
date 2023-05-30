<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataLinks - Buy data for all networks at cheap prices</title>
    <!-- CSS Stylesheets -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles2.css">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">

    <!-- JavaScript -->
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
</head>

<body>
    <div id="loader" class="loader">
        <h2 class="loader-text">DataLinks</h2>
    </div>
    <div id="content" class="hidden">
        <!-- Header -->
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="/uploads/logo.png" alt="Chatdoc Logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link active" href="#about">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Buy Data</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Pricing Plan</a>
                            </li>
                        </ul>
                        <a class="btn btn-primary" href="#book-appointment">Login/Register</a>
                    </div>
                </nav>
            </div>
        </header>

        <section class="welcome-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 mb-3">
                        <h3>Welcome, {{ auth()->user()->name }}</h3>
                        <p>Your Wallet Balance: &#8358;{{ number_format(auth()->user()->wallet->balance) }}</p>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-header">
                                <h5>Account Numbers</h5>
                            </div>
                            <div class="card-body">
                                <div class="horizontal-scroll">
                                    <!-- Account Numbers Section -->
                                    <div id="account-carousel" class="owl-carousel">

										@if(is_array($accounts) && count($accounts) > 0)
										@foreach($accounts as $account)
                                        <div class="account-card">
                                            <h6>{{ $account['bankName'] }}</h6>
                                            <p>{{ $account['accountNumber'] }}</p>
                                            <p>{{ $account['accountName'] }}</p>
                                        </div>
										@endforeach
										@else
										<div class="account-card">
                                            <h6>No Account Numbers</h6>
                                            <p></p>
                                            <p></p>
                                        </div>
										@endif
							
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="data-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card mb-3">
                            <div class="card-header">
                                <h5>Buy Data Quickly</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="network">Select Network:</label>
                                        <select class="form-control" id="network">
                                            <option value="network1">Network 1</option>
                                            <option value="network2">Network 2</option>
                                            <option value="network3">Network 3</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="dataAmount">Data Amount:</label>
                                        <input type="text" class="form-control" id="dataAmount">
                                    </div>
                                    <div class="form-group">
                                        <label for="phoneNumber">Phone Number:</label>
                                        <input type="text" class="form-control" id="phoneNumber">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Buy Data</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Recent Transactions</h5>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Network</th>
                                                <th>Amount</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>2023-05-28</td>
                                                <td>Network 1</td>
                                                <td>1GB</td>
                                                <td>Successful</td>
                                            </tr>
                                            <tr>
                                                <td>2023-05-27</td>
                                                <td>Network 2</td>
                                                <td>500MB</td>
                                                <td>Failed</td>
                                            </tr>
                                            <tr>
                                                <td>2023-05-26</td>
                                                <td>Network 3</td>
                                                <td>2GB</td>
                                                <td>Successful</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <!-- Footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <img src="/uploads/logo.png" alt="DataLinks Logo">
                        <p>&copy; 2023 DataLinks. All rights reserved.</p>
                    </div>
                    <div class="col-md-4">
                        <h6>Quick Links</h6>
                        <ul>
                            <li><a href="#">Home</a></li>
                            <li><a href="#">Buy Data</a></li>
                            <li><a href="#">Pricing Plan</a></li>
                            <li><a href="#">FAQs</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4">
                        <h6>Contact Us</h6>
                        <p>123 Main Street, City, Country</p>
                        <p>Email: info@datalinks.com</p>
                        <p>Phone: +1 123-456-7890</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>

	<a href="https://api.whatsapp.com/send?phone=YOUR_PHONE_NUMBER" class="whatsapp-btn">
        <button type="button" class="btn btn-success">
            <i class="fab fa-whatsapp"></i> Contact Us on WhatsApp
        </button>
    </a>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            var loader = document.getElementById('loader');
            var content = document.getElementById('content');

            // Hide the loader and display the content
            loader.classList.add('hidden');
            content.classList.remove('hidden');
        });
    </script>

    <script>
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 15,
                nav: true,
                dots: true,
                navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
                mouseDrag: true,
                touchDrag: true,
                responsive: {
                    0: {
                        items: 1,
                        stagePadding: 40,
                        center: true
                    },
                    768: {
                        items: 2
                    },
                    992: {
                        items: 3
                    }
                }
            });

        });
    </script>

    <!-- Owl Carousel JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.hero-carousel').owlCarousel({
                items: 1,
                loop: true,
                autoplay: true,
                autoplayTimeout: 5000,
                autoplayHoverPause: true,
                dots: false,
                nav: false
            });
            $('.carousel').carousel({
                interval: 3000, // Adjust the interval as needed (in milliseconds)
                pause: false, // Set to true if you want the auto-scrolling to pause on hover
                ride: 'carousel' // Enable the automatic cycling of the carousel
            });
        });
    </script>
</body>

</html>
