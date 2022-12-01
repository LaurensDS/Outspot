<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Scripts -->
	<script src="{{ asset('js/app.js') }}" defer></script>
	<!-- Styles -->
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">
	<title>Document</title>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="/">Home</a>
		</nav>
		@if (!empty($status) || Session::get('status'))
			<div class="alert alert-success alert-dismissible" role="alert">
			<strong>Status of {{Session::get('id')}} is {{Session::get('status')}}</strong>
				<button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
		@endif
		<form method="POST" action="/mollie">
			@csrf
			<div class="row">
				<div class="col">
					<input type="number" name="amount" min="10" max="100" value="10" class="form-control">
					<label>Please fill in a number between 10 and 100</label>
				</div>
				<div class="col">
					<button class="form-control" type="submit"> Pay </button>
				</div>
			</div>
		</form>
	</div>
</body>
</html>

