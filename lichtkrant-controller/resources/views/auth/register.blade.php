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
		<h2>Registreer een nieuwe gebruiker</h2>
        <form method="POST" action="{{ route('postuser') }}">
			@csrf
			<label for="username" :value="__('Name')">Naam</label>
			<input id="name"  type="text" name="name" :value="old('name')" required autofocus />

			<label for="password" :value="__('Username')" >Gebruikersnaam</label>
			<input id="username"  type="text" name="username" :value="old('username')" required />
            
            <label for="email" :value="__('Email')">E-mailadres</label>
			<input id="email"  type="text" name="email" :value="old('email')" required />

            <label for="password" :value="__('Password')">Wachtwoord</label>
			<input id="password" 
			type="password"
			name="password"
			required autocomplete="new-password" />

			<label for="password" :value="__('Password')">Herhaal wachtwoord</label>
			<input id="password_confirmation" 
			type="password"
			name="password_confirmation" required />

			<button type="submit">                    
				{{ __('Registreer') }}
			</button>
		</form>
	</div>
</body>
</html>
