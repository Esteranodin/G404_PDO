<?php

require_once './utils/connect.php';

if (isset($_GET['error'])) {
    $error = $_GET['error'];
} else {
    $error = false;
}

$id = $_POST['idPatient'];
$sql = "SELECT * FROM `patients` WHERE `id` = $id";

try {
    $stmt = $pdo->query($sql);
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
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

    <section class="formulaire">

        <form action="./process/modifier_form_process.php" method="post">
        <?php
    foreach ($patients as $patient) {
        ?>
            <label for="lastName"> Votre nom de famille :</label>
            <input type="text" name="lastName" id="lastName" value="<?php echo htmlspecialchars($patient['lastname']) ?>">

            <label for="firstName"> Votre prénom :</label>
            <input type="text" name="firstName" id="firstName" value="<?php echo htmlspecialchars($patient['firstname']) ?>">

            <label for="birthdate"> Votre date de naissance :</label>
            <input type="date" name="birthdate" id="birthdate" value="<?php echo htmlspecialchars($patient['birthdate']) ?>">

            <label for="phone"> Votre numéro de téléphone:</label>
            <input type="phone" name="phone" id="phone" value="<?php echo htmlspecialchars($patient['phone']) ?>">

            <label for="mail"> Votre e-mail :</label>
            <input type="mail" name="mail" id="mail" value="<?php echo htmlspecialchars($patient['mail']) ?>">

            <input type="hidden" name="idPatient" value="<?= $patient['id'] ?>">
            <input type="submit" value="Envoyer">

            <?php
    }
        ?>
        </form>

    </section>



</body>

</html>