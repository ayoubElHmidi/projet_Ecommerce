<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form-v6 by Colorlib</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet"  href="{{asset('css/nunito-font.css')}}">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{asset('loginRegister/css/style.css')}}"/>
</head>
<body class="form-v6">
	<div class="page-content">
		<div class="form-v6-content">
			<div class="form-left">
				<img src="{{asset('loginRegister/images/form-v6.jpg')}}" alt="form">
			</div>
            <form method="POST" class="form-detail"  action="{{ route('register') }}">
                @csrf
				<h2>Register Form</h2>
				<div class="form-row">
                    <x-text-input id="name" placeholder="Your Name" class="input-text" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
				
                <div  class="form-row">
                    
                    <x-text-input id="email" class="input-text" type="email" name="email" placeholder="Email Address"  :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

				<!-- Password -->
                <div class="form-row">
                    
        
                    <x-text-input id="password" class="input-text"
                                    type="password"
                                    name="password"
                                    placeholder="Password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="form-row">

        
                    <x-text-input id="password_confirmation" class="input-text"
                                    type="password"
                                    placeholder="Comfirm Password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="form-row-last">
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="register">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
			</form>
		</div>
	</div>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>