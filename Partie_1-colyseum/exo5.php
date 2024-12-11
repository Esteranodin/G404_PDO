<?php
require_once './connect.php';

$sql = "SELECT * -- pour opti il aurait été mieux de choisir ce qu'on veut comme infos plutôt que de laisser *
FROM `clients`
WHERE lastName LIKE 'm%'
ORDER BY clients.lastName ASC";

try {
    $stmt = $pdo->query($sql);
    $clients = $stmt->fetchAll(PDO::FETCH_ASSOC); 

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
    <h1>Personnes qui ont un nom de famille commençant par "M":</h1>
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
