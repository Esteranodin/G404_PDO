<?php
require_once './connect.php';

$sql1 = "SELECT * FROM `clients`";

try {
    $stmt = $pdo->query($sql1);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


$sql2 = "SELECT * FROM `genres`";

try {
    $stmt = $pdo->query($sql2);
    $genres = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Liste des utilisateurs :</h1>
    <ol>

        <?php
        foreach ($clients as $client) {
        ?>
            <li>Nom : <?= $client['lastName']  ?> <br> Prénom : <?= $client['firstName']  ?> </li>
            <br>

        <?php
        }

        ?>
    </ol>

    <h1>Liste des types de spectacles :</h1>
    <ol>

        <?php
        foreach ($genres as $genre) {
        ?>
            <li>Nom : <?= $genre['genre']  ?></li>
            <br>

        <?php
        }

        ?>

    </ol>
</body>

</html>
