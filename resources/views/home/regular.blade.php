<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>DataLinks - Home</title>
</head>
<body>
	@if (Auth::check())
		<h3>Welcome, {{ auth()->user()->name }}</h3>
		<h4>Wallet Balance: {{ number_format(auth()->user()->wallet->balance) }}</h4>

			
			@if(is_array($accounts) && count($accounts) > 0)
			<h2>Accounts:</h2>
			<ul>
				@foreach($accounts as $account)
					<li>
						<strong>Bank Name:</strong> {{ $account['bankName'] }}<br>
						<strong>Account Number:</strong> {{ $account['accountNumber'] }}<br>
						<strong>Account Name:</strong> {{ $account['accountName'] }}
					</li>
				@endforeach
			</ul>
			@else
			<p>No accounts found.</p>
			@endif


			<a href="{{ route('logout') }}" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="color: #333; text-decoration: none; padding: 8px 12px; background-color: #f5f5f5; border: 1px solid #ccc; border-radius: 4px;">Logout</a>

			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>



	@else
		<p>Please log in to view your wallet balance.</p>
	@endif
</body>
</html>