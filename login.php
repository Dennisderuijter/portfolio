<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Login</title>

	<!-- jQuery source -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="dashboard.min.css">

</head>
<body>

	<?php
	// Connect with DB
	require('connect.php');
	session_start();
	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
		$username = stripslashes($_REQUEST['username']);
		$password = stripslashes($_REQUEST['password']);
		$password = md5($password);

		$query = $db->prepare("SELECT * FROM users WHERE user_name=:username and user_pass=:password");
		$query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
    	$query->execute();
        if($query){
	    	$_SESSION['username'] = $username;
	    	header("Location: dashboard.php");
        } else { ?>
			<div class='form' id='login'>
				<h3>Username/password is incorrect.</h3>
				<br/>Click here to <a href='login.php'>Login</a>
			</div>
		<?php }
	} else { ?>

		<form action="" method="post" id="login">
			<section>
				<h3>Aanmelden</h3>
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="submit" name="submit">
			</section>
			<p>Nog geen account? <a href='register.php'><i>Registreer hier</i></a></p>
		</form>

	<?php } ?>

	<!-- JavaScript -->
	<script type="text/javascript" src="script.js"></script>

</body>
</html>
