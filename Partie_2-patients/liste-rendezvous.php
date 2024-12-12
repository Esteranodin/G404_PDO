<?php
require_once './utils/connect.php';

$sql = "SELECT patients.lastname, patients.firstname, patients.birthdate, appointments.dateHour, appointments.id
FROM `appointments`
JOIN patients ON patients.id = appointments.idPatients";

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
    <title>Liste rendez-vous</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <h1>Liste des rendez-vous</h1>

    <ol>
        <?php
        foreach ($patients as $patient) {
        ?>
            <li class = "formulaire"> 
                Nom : <?= $patient['lastname']  ?> <br>
                Prénom : <?= $patient['firstname'] ?><br>
                Date de naissance : <?= $patient['birthdate'] ?><br>
                <hr>
                Rendez-vous le : <?= $patient['dateHour'] ?>
                <form action="./rendez-vous.php" method="post">
                    <input type="hidden" name="idAppointments" value="<?= $patient['id']  ?>">
                    <input type="submit" value="Voir le RDZ-VS">
                </form>
            </li>          
    
        <?php
        }
        ?>
    </ol>

    <a href="./ajout-rendezvous.php"> Ajouter un rendez-vous </a>
    <a href="./index.php"> Retour à l'accueil </a>

</body>

</html>