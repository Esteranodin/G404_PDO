<?php
require_once './connect.php';

$sql = "SELECT * FROM `shows` ORDER BY `shows`.`title` ASC";

try {
    $stmt = $pdo->query($sql);
    $shows = $stmt->fetchAll(PDO::FETCH_ASSOC); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat

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
    <h1>Liste des spectacles :</h1>
    <ol>

        <?php
        foreach ($shows as $show) {
        ?>
            <li> Spectacle " <?= $show['title']  ?> "
                <br>par <?= $show['performer']  ?>
                <br>le <?= $show['date']  ?>
                <br>à <?= $show['startTime']  ?>
            </li>
            <br>

        <?php
        }

        ?>
    </ol>

</body>

</html>