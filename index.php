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
        <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    	<link rel="stylesheet" href="style.min.css">
    </head>
    <body>

        <div class="container-fluid">

            <div class="row header">
                <div class="col-md-6">
                    <h1>DENNIS DE RUIJTER</h1>
                </div>
                <div class="col-md-6">
                    <nav>
                        <ul>
                            <?php while ($row=$nav->fetch(PDO::FETCH_ASSOC)) { ?>
                                <li>
                                    <a href="<?= $row['nav_url']; ?>"><?= $row['nav_name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </nav>
                </div>
            </div>

            <div class="row content">
                <div class="col-md-">

                </div>
            </div>

        </div>

        <!-- JavaScript -->
        <script type="text/javascript" src="bootstrap/bootstrap.min.js"></script>
    	<script type="text/javascript" src="script.js"></script>

    </body>
</html>
