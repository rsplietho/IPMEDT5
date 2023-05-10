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

<h1 class="titel">Lichtkrant</h1>
	<div class="container">
		<h2>Reset Wachtwoord</h2>
		<form method="POST" action="{{ route('password.email') }}">
            @csrf

            <label for="email" :value="__('Email')">E-mailadres</label>
            <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            <p></p>
            <button>{{ __('Email Wachtwoord Reset Link') }}</button>
            <a href="{{ route('login')}}">Ga terug</a>
        </form>
	</div>
</body>
</html>