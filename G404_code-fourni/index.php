<?php
require_once './utils/connect_db.php';

$sql = "SELECT * FROM `utilisateur`";

try {
    $stmt = $pdo->query($sql);
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
</head>

<body>
    <h1>Liste des utilisateurs :</h1>
    <ol>

        <?php
        foreach ($users as $user) {
        ?>
            <li>Nom : <?= $user['nom']  ?> | Prénom : <?= $user['prenom']  ?> </li>

        <?php
        }

        ?>

    </ol>

</body>

</html>
?>