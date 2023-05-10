<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap');</style>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Lichtkrant</title>
</head>
<body>
    <h1>Lichtkrant</h1>
	<div class="container">
        @if($errors->any())
            @foreach ($errors->all() as $error)
                <p class="error">{{ $error }}</p>
            @endforeach
        @endif
        @yield("content")
        <a class="button" href="{{ route('user')}}">Ga terug</a>
	</div>
</form>
</body>
</html>
