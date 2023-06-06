<!doctype html>
<html lang="en">
  <head>
  	<title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="{{asset('https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap')}}" rel="stylesheet">

	<link rel="stylesheet" href="{{asset('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css')}}">
	
	<link rel="stylesheet" href="{{asset('css/css/style.css')}}">

	</head>
	<body class="img js-fullheight" style="background-image: url(images/bg.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Login </h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
					<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
				  <form method="POST" class="signin-form" action="{{ route('login') }}">
					@csrf
					<div class="form-group">
						<x-text-input id="email" class="form-control" 
										type="email" 
										name="email" 
										:value="old('email')" 
										required autofocus autocomplete="username" 
										placeholder="Email" />
						<x-input-error :messages="$errors->get('email')" class="mt-2" />
					</div>
					<div class="form-group">
						<x-text-input id="password" class="form-control"
										type="password"
										name="password"
										required autocomplete="current-password" 
										placeholder="Password" />
				
						<x-input-error :messages="$errors->get('password')" class="mt-2" />
					</div>
					<div class="block mt-4">
						<label for="remember_me" class="inline-flex items-center">
							<input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
							<span class="ml-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
						</label>
					</div>
					<div class="flex items-center justify-end mt-4">
						@if (Route::has('password.request'))
							<a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
								{{ __('Forgot your password?') }}
							</a>
						@endif
					</div>
					<div class="form-group">
						
						<x-primary-button class="form-control btn btn-primary submit px-3">
							{{ __('Log in') }}
						</x-primary-button>
					</div>
				</form>
				
	          <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
	          <div class="social d-flex text-center">
	          	<a href="#" class="px-2 py-2 mr-md-1 rounded"><span class="ion-logo-facebook mr-2"></span> register</a>
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{asset('js/jquery.min.js')}}"></script>
  <script src="{{asset('js/popper.js')}}"></script>
  <script src="{{asset('js/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/main.js')}}"></script>

	</body>
</html>

