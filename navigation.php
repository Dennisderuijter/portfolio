<?php
require('connect.php');
include('auth.php');
$page_name = 'Navigation';
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
		    <div class="content-block display_list">
		    	<h2><?= $page_name; ?></h2>
		    	<ul>
					<?php
					$query = $db->prepare("SELECT * FROM nav ORDER BY nav_name");
			    	$query->execute();
					while($row=$query->fetch(PDO::FETCH_ASSOC)){
						$uc_row = array_map('ucfirst', $row); ?>
					    <li>
							<?= $uc_row['nav_name']; ?>
							<a href='delete.php?id=<?= $row['nav_id']; ?>&page=<?= $page_name; ?>&data=nav'>
								<i class='far fa-times-circle'></i>
							</a>
							<a href='edit.php?id=<?= $row['nav_id']; ?>'>
								<i class='far fa-edit'></i>
							</a>
						</li>
					<?php }?>
				</ul>
		    </div>
		    <div class="content-block">
		    	<h2>New nav-item</h2>
		    	<form action="" method="post" class="new">
					<label for="nav_name">Name</label>
			    	<input type="text" name="nav_name" placeholder="nav-item name" required><br>
					<label for="nav_url">URL</label>
					<input type="text" name="nav_url" placeholder="nav-item url" required><br>
			    	<input type="submit" name="new_nav-item" value="Add">
			    </form>
		    	<?php
		    	if(isset($_POST["new_nav-item"])){
					$query = $db->prepare("INSERT INTO nav (nav_name, nav_url) VALUES (:nav_name, :nav_url)");
					$query->bindParam(':nav_name', $_POST["nav_name"], PDO::PARAM_STR);
					$query->bindParam(':nav_url', $_POST["nav_url"], PDO::PARAM_STR);
					$query->execute();
				 	if ($query) { ?>
				    	<script type='text/javascript'>window.location.href = 'navigation.php';</script>
				 	<?php } else { ?>
				    	<script type='text/javascript'>alert('Error: <?= $query; ?><br><?= $query->error; ?>');</script>
				 	<?php }
				}
		    	?>
		    </div>
		</div>
	</div>

	<!-- JavaScript -->
	<script type="text/javascript" src="script.js"></script>

</body>
</html>
