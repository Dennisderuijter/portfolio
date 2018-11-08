<div class="content-block breadcrumbs">
	<h2>
		<a href="index.php">Home</a>
		<i class="fas fa-angle-right"></i>
		<span>
			<?php
				if (!isset($uc_name)) {
					echo $_GET['page'];
				} else {
					echo $uc_name;
				}
			?>	
		</span>
		<?php
		if (isset($_GET['id'])) {
			echo '<i class="fas fa-angle-right"></i>';
			echo '<span> '.$action.'</span>';
		}
		?>
	</h2>
</div>