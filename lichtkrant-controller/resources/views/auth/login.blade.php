<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap');</style>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <title>Lichtkrant Login</title>
</head>
<body>

<h1 class="titel">Lichtkrant</h1>

<form method="POST" action="{{ route('login') }}">
	<div class="container">
		<h2>Login</h2>
		<form>
            @csrf
            <label for="username" :value="__('Username')">Gebruikersnaam</label>
                <input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />

            <label for="password" :value="__('Password')">Wachtwoord</label>
            <input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" />
            <!-- Remember Me -->

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Blijf ingelogd') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                @endif



			<button type="submit"> 
                {{ __('Log in') }}
            </button>
		</form>
	</div>
</form>
</body>
</html>
