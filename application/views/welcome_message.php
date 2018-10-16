<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$email=$this->session->userdata('email');
if($email!=""){redirect("Dashboard");}
?><!DOCTYPE html>
<html lang="en">
<head>
	<base href="<?=base_url()?>">
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
	<title>Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<style media="screen">
		.row{
			justify-content: center;
			align-items: center;
		}
	</style>
</head>
<body>
<div >
<div class="container">
	<div class="row">
		<div class="col-lg-7 col-md-7 col-sm-12 col-12">
			<div style="padding:50px 0 50px;">
				<img class="img-fluid" src="lo.png" width="80%"/>
			</div>
		</div>
		<div class="col-lg-5 col-md-5 col-sm-12 col-12">
			<form class="form-signin" id="form-signin">
				<h1 class="text-uppercase" style="color:#0191a5;">Transformative</h1>
				<p style="font-weight:600;font-size: 14px;margin-bottom:30px;">Your Logistic, Inventory And Order Just Click Away</p>
	      <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
				<div class="form-group">
					<label for="inputEmail" class="sr-only">Email address</label>
		      <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
				</div>
				<div class="form-group">
					<label for="inputPassword" class="sr-only">Password</label>
				  <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
				</div>
				<div class="checkbox mb-3">
	        <label>
	          <input type="checkbox" value="remember-me"> Remember me
	        </label>
	      </div>
	      <button class="btn btn-primary btn-block" type="button" id="signin">Sign in</button>
	      <p class="mt-5 mb-3 text-muted text-center">&copy; 2017-2018</p>
	    </form>
		</div>
	</div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
<script type="text/javascript">
	(function(){
		$('#signin').click(function(){
			let email = $('#inputEmail').val();
			let password = $('#inputPassword').val();
			if(email !== '' && password !== ''){
				$.ajax({
						method:'POST',
						url:'Login/userLogin',
						dataType:'JSON',
						data:{email:email,password:password}
					}).done(function(response){
						if(response){
							if(response.error === 1){
								 alert(response.error_desc);
							}else if(response.error === 2){
								window.location.reload(true);
							}else if(response.error === 0){
								window.location.replace("Dashboard");
							}else{
								alert('Something went wrong.');
							}
						}
					}).fail(function(err){
						throw err;
					});
			}else{
				alert('Please Enter Your Details');
			}
		});
	})();
</script>
</body>
</html>
