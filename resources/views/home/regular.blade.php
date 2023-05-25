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
		<h1>Wallet Balance: {{ number_format(auth()->user()->wallet->balance) }}</h1>

			
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


	@else
		<p>Please log in to view your wallet balance.</p>
	@endif
</body>
</html>