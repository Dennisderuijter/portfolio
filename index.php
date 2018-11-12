<?php
require('connect.php');

$nav = $db->prepare("SELECT * FROM nav ORDER BY nav_name");
$nav->execute();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Portfolio</title>

        <!-- jQuery source -->
    	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    	<!-- CSS -->
    	<link rel="stylesheet" type="text/css" href="dashboard.min.css">
    </head>
    <body>

        <div class="container">

            <header>
                <nav>
                    <ul>
                        <?php while ($row=$nav->fetch(PDO::FETCH_ASSOC)) { ?>
                            <a href="<?= $row['nav_url']; ?>">
                                <li><?= $row['nav_name']; ?></li>
                            </a>
                        <?php } ?>
                    </ul>
                </nav>
            </header>

        </div>

        <!-- JavaScript -->
    	<script type="text/javascript" src="script.js"></script>

    </body>
</html>
