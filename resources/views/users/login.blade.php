@extends('users.blank')

@section('reference')

@stop

@section('content')
	<section id="form"><!--form-->
		<div class="container">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-1">
					<div class="login-form"><!--login form-->
						<h2>Login to your account</h2>
						<form id="form-login" method = "POST" action = "{{asset('/authenticate')}}" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input id="email" type="email" name="email" placeholder="Email" />
							<input id="password" type="password" name="password" placeholder="Password" />
							<br>
							<span>
								<input type="checkbox" class="checkbox"> 
								Keep me signed in
							</span>
							<button type="submit" class="btn btn-default">Login</button>
						</form>
					</div><!--/login form-->
				</div>
				<div class="col-sm-1">
					<h2 class="or">OR</h2>
				</div>
				<div class="col-sm-4">
					<div class="signup-form"><!--sign up form-->
						<h2>New User Signup!</h2>
						<form id="register-form" method = "POST" action = "{{route('user.store')}}" role="form">
							<input type="hidden" name="_token" value="{{ csrf_token() }}">
							<input type="text" name="name" placeholder="Name"/>
							<input id="remail" type="email" name="email" placeholder="Email Address"/>
							<input type="password" name="password" placeholder="Password"/>
							<button type="submit" class="btn btn-default">Signup</button>
						</form>
					</div><!--/sign up form-->
				</div>
			</div>
		</div>
	</section><!--/form-->
@stop

@section('scripts')
<script>
			$.ajaxSetup({
			  	headers: {
			    	'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  	}
			});
		    $("#form-login").validate({
				rules:{
					email:{
						required:true,
						minlength:6,
					},
					password:{
						required:true,
						minlength:4,
						remote: {  
		                url: "{{asset('check_auth')}}",
		                type: 'POST',
		                data: {
					        email: function() {
					       		return $( "#email" ).val();
					        	},
					    	password: function() {
					       		return $( "#password" ).val();
					        	}
					    	}
		            	}
					}
				},
				messages:{
					email:{
						required:"Please enter an email"
					},
					password:{
						required:"Please enter password",
						remote:"Email or Password is not correct"
					},
				}
			});

			$("#register-form").validate({
				rules:{
					email:{
						required:true,
						minlength:6,
						remote: {  
		                url: "{{asset('check_email')}}",
		                type: 'POST',
		                data: {
					        email: function() {
					       		return $( "#remail" ).val();
					        	}
					        }
		            	}
					},
					password:{
						required:true,
						minlength:4,
					}
				},
				messages:{
					email:{
						required:"Please enter an email",
						remote:"This email is already existed"
					},
					password:{
						required:"Please enter password",
					},
				}
			});
</script>
@stop