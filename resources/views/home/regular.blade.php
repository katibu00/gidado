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
	@else
		<p>Please log in to view your wallet balance.</p>
	@endif
</body>
</html>