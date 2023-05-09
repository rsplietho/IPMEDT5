<!DOCTYPE html>
<html>
<head>
	<title>Lichtkrant login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/main.css">
</head>
<body class="body_login">

<h1>Lichtkrant</h1>

<form method="POST" action="{{ route('login') }}">
	<div class="container">
		<h2>Login</h2>
		<form>
            @csrf
            <label for="username" :value="__('Username')">Username</label>
                <input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus />

            <label for="password" :value="__('Password')">Password</label>
            <input id="password" class="block mt-1 w-full"
            type="password"
            name="password"
            required autocomplete="current-password" />

            <!-- Remember Me -->

            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
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
