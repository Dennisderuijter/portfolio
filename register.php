<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home</title>

    <!-- jQuery source -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="dashboard.min.css">

</head>
<body>
    <?php
    require('connect.php');
    if (isset($_REQUEST['username'])){
        $username = stripslashes($_REQUEST['username']);
        $password = stripslashes($_REQUEST['password']);
        $password = md5($password);
        $trn_date = date("Y-m-d H:i:s");

        $query = $db->prepare("INSERT INTO users (user_name, user_pass, display_name, trn_date) VALUES (:username, :password, :display, :trn_date)");
        $query->bindParam(':username', $username, PDO::PARAM_STR);
		$query->bindParam(':password', $password, PDO::PARAM_STR);
        $query->bindParam(':display', $username, PDO::PARAM_STR);
        $query->bindParam(':trn_date', $trn_date, PDO::PARAM_STR);
    	$query->execute();
        $succes = $query->fetch(PDO::FETCH_ASSOC);

        if ($succes) { ?>
            <div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a>
            </div>
        <?php }
    } else { ?>
        <form name="registration" action="" method="post" id="register">
            <h3>Registratie</h3>
            <input type="text" name="username" placeholder="Username" required />
            <input type="password" name="password" placeholder="Password" required />
            <input type="submit" name="submit" value="Registreren" />
        </form>
    <?php } ?>

    <!-- JavaScript -->
    <script type="text/javascript" src="script.js"></script>
</body>
</html>
