<?php
// index.php

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = false;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traitement de formulaire</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>
    <h1>hello world</h1>


    <?php
    if ($error == 1) {
        echo '<p> Je te vois supprimer mes champs ...</p>';
    }

    if ($error == 2) {
        echo '<p> Il faut remplir tous les champs !!</p>';
    }

    ?>

    <form action="./process/default_form_process.php" method="post">
        <label for="firstName"> Prenom :</label>
        <input type="text" name="firstName" id="firstName" required maxlength="10">

        <label for="lastName"> Nom de famille :</label>
        <input type="text" name="lastName" id="lastName">

        <label for="age"> Age :</label>
        <input type="text" name="age" id="age">

        <label for="email"> Email :</label>
        <input type="email" name="email" id="email">

        <label for="password"> Password :</label>
        <input type="password" name="password" id="password">

        <input type="submit" value="Envoyer">

        <a href="./index.php"> Cliquez pour ajouter un patient </a>
    </form>

</body>

</html>
