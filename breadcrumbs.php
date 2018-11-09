<div class="content-block breadcrumbs">
	<a href="dashboard.php">Dashboard</a>
	<i class="fas fa-angle-right"></i>
	<span>
		<?php
			if (!isset($page_name)) {
				echo $_GET['page'];
			} else {
				echo $page_name;
			}
		?>
	</span>
	<?php
	if (isset($_GET['id'])) {
		echo '<i class="fas fa-angle-right"></i>';
		echo '<span> '.$action.'</span>';
	}
	?>
</div>
