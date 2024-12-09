<?php
try {


    $host = "localhost";
    $dbname = "p4_php_pdo_livecode";
    $login = "root";
    $password = "";

    $pdo = new PDO("mysql:host={$host};dbname={$dbname}", $login, $password);



} catch (PDOException $error) {
    echo "Erreur de connexion : " . $error->getMessage();
}


?>