<?php
    $host = "localhost";
    $dbname = "db_uasku"
    $user = "root"
    $pass = "";

    try {
        $koneki = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOExeption $e)
    {
        echo  $e->getMessage();
    }
    