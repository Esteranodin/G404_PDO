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
        <li>Nom : <?= $patient['lastname']  ?> <br>
            Prénom : <?= $patient['firstname']  ?>
        <?php
    }

        ?>
        <a href="./liste-patients.php">Retour à la liste des patients </a>

</body>

</html>