<?php
require_once './connect.php';

$sql = "SELECT * FROM `clients`";

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
    <h1>Liste des clients :</h1>

    <ul>
        <?php
        foreach ($clients as $client) { ?>
            <li>Nom : <?= $client['lastName']  ?> <br>
                Prénom : <?= $client['firstName']  ?> <br>
                Date de naissance : <?= $client['birthDate']  ?> <br>

                <?php if ($client['card'] === 1) {
                    echo "Carte de fidélité : oui . <br>";
                    echo " Numéro de carte : {$client['cardNumber']} <br>";
                } else {
                    echo "Carte de fidélité : non";
                } ?>
            </li>
            <br>
        <?php
        };
        ?>

    </ul>

</body>

</html>