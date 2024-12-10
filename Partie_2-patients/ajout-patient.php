<?php

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
    <title>Formulalire d'ajout de patient</title>
    <link rel="stylesheet" href="./style.css">

</head>

<body>

    <?php
    if ($error == 1) {
        echo '<p> Je te vois supprimer mes champs...</p>';
    }

    if ($error == 2) {
        echo '<p> Veuillez remplir tous les champs </p>';
    }
    ?>

<section class = "formulaire">

    <form action="./process/default_form_process.php" method="post">

        <label for="lastName"> Votre nom de famille :</label>
        <input type="text" name="lastName" id="lastName">

        <label for="firstName"> Votre prénom :</label>
        <input type="text" name="firstName" id="firstName">

        <label for="birthdate"> Votre date de naissance :</label>
        <input type="date" name="birthdate" id="birthdate">
        
        <label for="phone"> Votre numéro de téléphone:</label>
        <input type="phone" name="phone" id="phone">

        <label for="mail"> Votre e-mail :</label>
        <input type="mail" name="mail" id="mail">

        <input type="submit" value="Envoyer">

    </form>

    </section>

    <a href="./index.php"> Retour à l'accueil </a>
    <a href="./liste-patients.php">Liste des patients </a>

</body>

</html>