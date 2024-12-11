<?php

require_once './utils/connect.php';

$today = date("Y-m-d");
date_default_timezone_set('UTC');

$sql = "SELECT * FROM `patients`";

try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

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
    <title>Formulaire d'ajout de patient</title>
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

    <section class="formulaire">

    <form action="./process/default_rdv_process.php" method="post">

            <label for="patients">Choississer le nom du patient</label>
            <select name="idPatients" id="idPatients">
                <?php foreach ($patients as $patient) {
                    echo '<option value="' . $patient['id'] .  '">' . $patient['lastname'] . " " . $patient['firstname'] . '</option>';
                } ?>
            </select>

            <label for="date"> Date du rendez-vous :</label>
            <input type="date" min="<?= $today ?>" name="date" id="date">
            <label for="time"> Heure du rendez-vous:</label>
            <input type="time" name="time" id="time">

            <input type="submit" value="Envoyer">

        </form>

    </section>

    <a href="./liste-rendezvous.php"> Retour aux rendez-vous</a>
    <a href="./index.php"> Retour à l'accueil </a>
    
</body>

</html>