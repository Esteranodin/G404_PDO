<?php
require_once './utils/connect.php';

$sql = "SELECT * FROM `patients`";

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
    <title>Document</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Liste des patients</h1>

    <ol>


        <?php
        foreach ($patients as $patient) {
        ?>
            <li>Nom : <?= $patient['lastname']  ?> <br>
                Prénom : <?= $patient['firstname']  ?>
                <form action="./profil-patient.php" method="post">
                    <input type="hidden" name="idPatient" value="<?= $patient['id'] ?>">
                    <input type="submit" value="Votre profil">
                </form>
            </li>

        <?php
        }

        ?>
    </ol>

    <a href="./ajout-patient.php"> Ajouter un patient </a>
    <a href="./index.php"> Retour à l'accueil </a>

</body>

</html>