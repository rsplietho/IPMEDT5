<!DOCTYPE html>
<html>
<head>
	<title>Register Page</title>
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

	<div class="container">
		<h2>Register</h2>
        <form method="POST" action="{{ route('register') }}">
			<label for="username" :value="__('Name')">Name</label>
			<input id="name"  type="text" name="name" :value="old('name')" required autofocus />

			<label for="password" :value="__('Username')" >Username</label>
			<input id="username"  type="text" name="username" :value="old('username')" required />
            
            <label for="email" :value="__('Email')">E-mail</label>
			<input id="email"  type="text" name="email" :value="old('email')" required />

            <label for="password" :value="__('Password')">Password</label>
			<input id="password" 
			type="password"
			name="password"
			required autocomplete="new-password" />

			<label for="password" :value="__('Password')">Password confirmation</label>
			<input id="password_confirmation" 
			type="password"
			name="password_confirmation" required />

			<button type="submit">                    
				{{ __('Register') }}
			</button>
		</form>
	</div>
</body>
</html>
