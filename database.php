<?php

    // Database Details
    $dbHost = "localhost";
    $dbName = "katelynn96_ei4";
    $dbUser = "katelynn96_ei4";
    $dbPassword = "A62lRDdr9n";

    // Database Object
    $db = null;

    // Connect to database
    try {
        $db = new PDO("mysql:host={$dbHost};dbname={$dbName}", $dbUser, $dbPassword); 
    } catch(PDOException $ex) {
        $db = null;
    }

?>