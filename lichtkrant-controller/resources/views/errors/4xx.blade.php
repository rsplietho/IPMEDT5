<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap');</style>
    <link rel="stylesheet" href="{{ asset('css/error.css') }}">
    <title>Error {{ $exception->getCode() }}</title>
</head>
<body>

<h1 class="title">Lichtkrant</h1>
	<div class="container">
        <h1>Error {{ $exception->getCode() }}</h1>
		<h2>{{ $exception->getMessage() }}</h2>
        <a href="./">Ga terug</a>
        <img src="http://http.cat/{{ $exception->getCode() }}">
	</div>
</body>
</html>