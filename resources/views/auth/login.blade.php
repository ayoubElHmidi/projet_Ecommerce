<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v6 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{asset('loginRegister/css/nunito-font.css')}}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('loginRegister/css/style.css')}}"/>
</head>
<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="{{asset('loginRegister/images/form-v6.jpg')}}" alt="form">
			</div>
			<form method="POST" class="form-detail" action="{{ route('login') }}">
				@csrf
				<h2>Login Form</h2>
				<div class="form-row">
					<x-text-input id="email" class="input-text" 
									type="email" 
									name="email" 
									:value="old('email')" 
									required autofocus autocomplete="username" 
									placeholder="Email" />
					<x-input-error :messages="$errors->get('email')" class="mt-2" />
				</div>
				<div class="form-row">
					<x-text-input id="password" class="input-text"
									type="password"
									name="password"
									required autocomplete="current-password" 
									placeholder="Password" />
			
					<x-input-error :messages="$errors->get('password')" class="mt-2" />
				</div>
				
				
				
				<div class="flex items-center justify-end mt-4">
					@if (Route::has('password.request'))
						<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
							{{ __('Forgot your password?') }}
						</a>
					@endif
				</div>
				<div class="form-row-last">
					<x-primary-button class="register">
						{{ __('Log in') }}
					</x-primary-button>
				</div>
			</form>
		</div>
	</div>
</body>
</html>