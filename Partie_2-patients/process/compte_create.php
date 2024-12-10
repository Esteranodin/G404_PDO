<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <h1>Le compte patient a bien été crée</h1>

    <?php

    if (isset($_GET['lastName'], $_GET['firstName'])) {
        echo "<p>Bienvenue {$_GET['firstName']}  {$_GET['lastName']} </p>";
    }
    ?>

<a href="../index.php"> Retour à l'accueil </a>

</body>

</html>