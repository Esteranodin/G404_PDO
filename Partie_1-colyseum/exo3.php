<?php
require_once './connect.php';

$sql = "SELECT * FROM `clients` 
LIMIT 20";

try {
    $stmt = $pdo->query($sql);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <h1>Liste des utilisateurs qui ont une carte de fidélité :</h1>
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

</body>

</html>