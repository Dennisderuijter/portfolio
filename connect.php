<?php

    $db_name = 'portfolio';
    $db_user = 'root';
    $db_pass = '';
    try{
        $db = new PDO('mysql:host=localhost;dbname='.$db_name, $db_user, $db_pass);
    } catch(PDOException $e) {
        echo 'Fout: '.$e->getMessage();
        die();
    }

 ?>
