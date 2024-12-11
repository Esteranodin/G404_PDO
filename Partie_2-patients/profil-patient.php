<?php
require_once './utils/connect.php';

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
    <title>Accueil</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    foreach ($patients as $patient) {
    ?>
        <div class="formulaire">
            <li>Nom : <?= $patient['lastname']  ?> </li>
            <li> Prénom : <?= $patient['firstname']  ?> </li>
            <li> Date de naissance : <?= $patient['birthdate']  ?> </li>
            <li> Tél : <?= $patient['phone']  ?> </li>
            <li> @ : <?= $patient['mail']  ?> </li>
        <?php
    }
        ?>
        <form action="./modifier-patient.php" method="post">
            <input type="hidden" name="idPatient" value="<?= $patient['id'] ?>">
            <input type="submit" value="Modifier votre profil">
        </form>
        </div>

        <a href="./liste-patients.php">Retour à la liste des patients </a>

</body>

</html>