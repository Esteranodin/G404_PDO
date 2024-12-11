<?php
require_once './connect.php';

$sql = "SELECT clients.firstName, clients.lastName, clients.birthDate, clients.card, clients.cardNumber, cardtypes.type FROM `clients` LEFT JOIN cards ON cards.cardNumber = clients.cardNumber LEFT JOIN cardtypes ON cardtypes.id = cards.cardTypesId;";

// LEFT JOIN = tout ce qui est à gauche de JOIN je prends tout, donc de FROM clients, et j'y adjoins les autres tables
// VS INNER JOIN qui prend que le commun --> cf. doc SQL

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
    <h1>Liste des clients :</h1>

    <ul>
        <?php
        foreach ($clients as $client) { ?>
            <li>Nom : <?= $client['lastName']  ?> <br>
                Prénom : <?= $client['firstName']  ?> <br>
                Date de naissance : <?= $client['birthDate']  ?> <br>

                <?php if ($client['card'] === 1) {
                    echo "Carte de membre : oui . <br>";
                    echo " Numéro de carte : {$client['cardNumber']} <br>";
                } else {
                    echo "Carte de fidélité : non";
                } ?>
                <!-- Faire une ternaire pour plus de lisibilité : echo $client['card'] ? "Oui" : "Non"; -->

                <?php if ($client['type'] === 'Fidélité') {
                    echo "Carte de fidélité : oui . <br>";
                    echo " Numéro de carte : {$client['cardNumber']} <br>";
                } ?>
            </li>
            <br>
        <?php
        };
        ?>

    </ul>

</body>

</html>