<?php include ('server.php');

// if user not logged in cannot access the home page

if (empty($_SESSION['username'])) {
	header('location: login.php');
	// code...
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title> 
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="header">
		Home page
	</div>
	<div class="content">
		<?php if (isset($_SESSION['success'])):?> 
			<div class="error success">
				<h3>
					<?php
					echo $_SESSION['success'];
					unset($_SESSION['success']);
					?>
				</h3>
			</div>
	<?php endif ?>
    <?php if (isset($_SESSION["username"])): ?> 
    	<p>Welcome<strong><?php echo $_SESSION['username']; ?>;</strong></p>
    	<p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
    	<?php endif ?>
	</div>

</body>
</html>