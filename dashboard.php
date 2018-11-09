<?php
require('connect.php');
include('auth.php');
$page_name = "Dashboard";
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
			<div class="content-block breadcrumbs">
				<span><?php echo $page_name; ?></span>
		    </div>
		    <div class="content-block">
		    	<p>WORK IN PROGRESS</p>
		    </div>
		</div>
	</div>

	<!-- JavaScript -->
	<script type="text/javascript" src="script.js"></script>

</body>
</html>
