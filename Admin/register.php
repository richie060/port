<?php include ('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		Register
	</div>
	<form method="post" action="register.php">

		<?php include('errors.php'); ?>

	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="<?php echo $username ?>">
	</div>
		<div class="input-group">
			<label>Email</label>
			<input type="text" name="email" value="<?php echo $email?>">
		</div>
	<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1" >
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" name="register" class="btn btn-primary">Register</button>
		</div>
		<p>Already a member?<a href="login.php">Sign in</p>
	</form>

</body>
</html>