<?php
require('connect.php');
include('auth.php');
$pagename = 'categories';
$uc_name = ucfirst($pagename);
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
		    <div class="content-block display_list">
		    	<h2><?php echo $uc_name; ?></h2>
		    	<ul>
					<?php
						$query = $db->prepare("SELECT * FROM categories ORDER BY name");
				    	$query->execute();
						while($row=$query->fetch(PDO::FETCH_ASSOC)){
							$uc_row = array_map('ucfirst', $row);
						    echo "<li>".$uc_row['name']."<a href='delete.php?id=".$row['id']."&page=".$pagename."'><i class='far fa-times-circle'></i></a><a href='edit.php?id=".$row['id']."'><i class='far fa-edit'></i></a></li>";
						}
					?>
				</ul>
		    </div>
		    <div class="content-block">
		    	<h2>New category</h2>
		    	<form action="" method="post" class="new">
			    	<input type="text" name="cat_name" id="name" placeholder="Category name" required><br>
			    	<input type="submit" name="newCat" value="Add">
			    </form>
		    	<?php
		    	if(isset($_POST["newCat"])){
					$query = $db->prepare("INSERT INTO categories (name) VALUES ('".$_POST["cat_name"]."')");
					$query->execute();
				 	if ($query) {
				    	echo "<script type='text/javascript'>window.location.href = 'categories.php';</script>";
				 	} else {
				    	echo "<script type='text/javascript'>alert('Error: " . $query . "<br>" . $query->error."');</script>";
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
