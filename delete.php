<?php
require('connect.php');
include('auth.php');
$action = 'Delete';
$uc_name = ucfirst($_GET['page']);
?>

<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Dashboard</title>

	<!-- jQuery source -->
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="dashboard.css">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>
	
	<?php include('sidebar.php'); ?>
	<div class="content">
		<div>
			<?php include('breadcrumbs.php'); ?>
		    <div class="content-block">
		    	<h2><?php echo $action; ?></h2>
		    	<p>...</p>
		    </div>
		    <div class="content-block">
		    	<form action="" method="post" class="new">
			    	<input type="submit" name="delete" value="Delete">
			    </form>
		    	<?php
		    	if(isset($_POST["delete"])){
				 	$sql = "DELETE FROM".$_GET['page']."WHERE id = ".$_GET['id']." LIMIT 1";
				 	if ($conn->query($sql) === TRUE) {
				    	echo "<script type='text/javascript'>window.location.href = 'categories.php';</script>";
				 	} else {
				    	echo "<script type='text/javascript'>alert('Error: " . $sql . "<br>" . $conn->error."');</script>";
				 	}
				} 
		    	?>
		    </div>
		</div>
	</div>

	<!-- JavaScript -->
	<script type="text/javascript" src="script.js"></script>

</body>
</html>