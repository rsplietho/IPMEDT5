<!DOCTYPE html>
<html>
<head>
	<title>Lichtkrant login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			font-family: Arial, sans-serif;
            background-image: url("https://wallpaper-mania.com/wp-content/uploads/2018/09/High_resolution_wallpaper_background_ID_77701862770.jpg");
		}
		.container {
			margin: 0 auto;
			max-width: 400px;
			padding: 20px;
			background-color: #fff;
			border-radius: 5px;
			box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.5);
		}
		h2 {
			text-align: center;
			color: #333;
		}
        h1 {
			text-align: center;
			color: white;
            text-shadow: 2px 2px black;
		}
		label {
			display: block;
			margin-bottom: 5px;
			color: #666;
		}
		input[type=text], input[type=password] {
			width: 100%;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			margin-bottom: 15px;
			box-sizing: border-box;
		}
		button {
			background-color: #15616D;
			color: #fff;
			padding: 10px 15px;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			width: 100%;
		}
		button:hover {
			background-color: white;
            color: #15616D;
            border: 2px solid #15616D;
		}
		@media only screen and (max-width: 600px) {
			.container {
				max-width: 300px;
			}
		}
	</style>
</head>
<body>

<h1>Lichtkrant</h1>

<form method="POST" action="{{ route('login') }}">
	<div class="container">
		<h2>Login</h2>
		<form>
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
