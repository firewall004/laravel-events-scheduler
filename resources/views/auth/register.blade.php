@include('includes.header')

<body>

	<div class="container">
		<div class="row" style="margin-top:45px">
			<div class="col-md-4 col-md-offset-4">
				<h4>Register</h4>
				<hr>
				<form action="{{ route('auth.save') }}" method="post">

					<!-- Move this to reusable -->
					@if(Session::get('success'))
					<div class="alert alert-success">
						{{ Session::get('success') }}
					</div>
					@endif

					@if(Session::get('fail'))
					<div class="alert alert-danger">
						{{ Session::get('fail') }}
					</div>
					@endif

					@csrf
					<div class="form-group">
						<label>First Name</label>
						<input type="text" class="form-control" name="firstName" placeholder="Enter first name" value="{{ old('firstName') }}">
						<span class="text-danger">@error('firstName'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Last Name</label>
						<input type="text" class="form-control" name="lastName" placeholder="Enter last name" value="{{ old('lastName') }}">
						<span class="text-danger">@error('name'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
						<span class="text-danger">@error('email'){{ $message }} @enderror</span>
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter password" value="{{ old('email') }}">
						<span class="text-danger">@error('password'){{ $message }} @enderror</span>
					</div>
					<button type="submit" class="btn btn-block btn-primary">Sign Up</button>
					<br>
					<a href="{{ route('auth.login') }}">I already have an account, login</a>
				</form>
			</div>
		</div>
	</div>

</body>

</html>
