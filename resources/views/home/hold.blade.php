<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">
    <style>
        /* Custom styles for the header on mobile devices */
        @media (max-width: 767.98px) {
            .navbar {
                flex-wrap: nowrap;
            }
            .navbar-collapse {
                width: 100%;
                flex-basis: 100%;
                flex-grow: 1;
            }
        }
    </style>
</head>

<body>
	<header>
		<div class="container">
		  <nav class="navbar navbar-expand-lg navbar-light bg-light">
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
				  <a class="nav-link" href="#about">Home</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#services">Departments</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#doctors">Services</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#faq">FAQ</a>
				</li>
				<li class="nav-item">
				  <a class="nav-link" href="#contact">Contact Us</a>
				</li>
				<li class="nav-item">
				  <a class="btn btn-primary" href="#book-appointment">Login/Register</a>
				</li>
			  </ul>
			</div>
		  </nav>
		</div>
	  </header>
	  

    <section class="welcome-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <h2>Welcome, [User's Name]</h2>
                    <p>Your Wallet Balance: [Wallet Balance]</p>
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
                                    <div class="account-card">
                                        <h6>Account Name 1</h6>
                                        <p>Account Number 1</p>
                                        <p>Bank Name 1</p>
                                    </div>
                                    <div class="account-card">
                                        <h6>Account Name 2</h6>
                                        <p>Account Number 2</p>
                                        <p>Bank Name 2</p>
                                    </div>
                                    <div class="account-card">
                                        <h6>Account Name 3</h6>
                                        <p>Account Number 3</p>
                                        <p>Bank Name 3</p>
                                    </div>
                                    <div class="account-card">
                                        <h6>Account Name 4</h6>
                                        <p>Account Number 4</p>
                                        <p>Bank Name 4</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="buy-data-section">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h5>Buy Data Quickly</h5>
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="buy-type">What do you want to buy?</label>
                            <select class="form-control" id="buy-type">
                                <option value="data">Data</option>
                                <option value="time">Time</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <select class="form-control" id="amount">
                                <!-- Add options for amount here -->
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Buy Now</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="recent-transactions-section">
        <div class="container">
            <h3>Recent Transactions</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Transaction ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>[Transaction Date]</td>
                        <td>[Transaction ID]</td>
                        <td>[Transaction Amount]</td>
                        <td>[Transaction Status]</td>
                    </tr>
                    <!-- Add more transaction rows here -->
                </tbody>
            </table>
        </div>
    </section> --}}

	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#account-carousel').owlCarousel({
                items: 3,
                margin: 20,
                dots: false,
                nav: true,
                responsive: {
                    0: {
                        items: 1
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
</body>

</html>

