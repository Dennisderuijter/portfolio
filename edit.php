<?php
require('connect.php');
include('auth.php');
$action = 'Edit';
$page_name = $_GET['page'];

$data_id = $_GET['data'].'_id';
$query = $db->prepare("SELECT * FROM ".$_GET['data']." WHERE ".$data_id." = :id");
$query->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
$query->execute();

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
	<link rel="stylesheet" type="text/css" href="dashboard.min.css">
	<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

</head>
<body>

	<?php include('sidebar.php'); ?>
	<div class="content">
		<div>
			<?php include('breadcrumbs.php'); ?>
		    <div class="content-block">
		    	<h2>Edit item</h2>
		    	<p>
					<?php
					while($row=$query->fetch(PDO::FETCH_ASSOC)){
						foreach ($row as $key => $value) {
							echo $key . ' = ' . $value . '<br>';
						}
					}
					?>
				</p>
		    </div>
		    <div class="content-block">
		    	<form action="" method="post">
			    	<input type="submit" name="edit" value="Edit">
			    </form>
		    	<?php
		    	if(isset($_POST["edit"])){
					$sql = $db->prepare("UPDATE ".$_GET['data']." WHERE ".$data_id." = :id");
					$sql->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
					$sql->execute();
				 	if ($sql) { // errorhandling is not working yet
				    	echo "<script type='text/javascript'>window.location.href = 'dashboard.php';</script>";
				 	} else {
				    	echo "<script type='text/javascript'>alert('Error: " . $sql->queryString . "<br>" . $sql->errorInfo()."');</script>";
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
