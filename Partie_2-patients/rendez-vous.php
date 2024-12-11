<?php
require_once './utils/connect.php';

$sql = "SELECT patients.lastname, patients.firstname, patients.birthdate, patients.phone, patients.mail, appointments.dateHour
FROM `appointments` 
JOIN patients ON patients.id = appointments.idPatients
WHERE appointments.id = :id";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $_POST['idAppointments']
    ]);
    $appointment = $stmt->fetch(PDO::FETCH_ASSOC);
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
    <div class="formulaire">
        <li> Nom : <?= $appointment['lastname']  ?> </li>
        <li> Prénom : <?= $appointment['firstname']  ?> </li>
        <li> Anniversaire : <?= $appointment['birthdate']  ?> </li>
        <li> Tél : <?= $appointment['phone']  ?> </li>
        <li> @ : <?= $appointment['mail']  ?> </li>
    </div>

    <div class="rdz">
        <li> Rendez-vous du <?= $appointment['dateHour']  ?> </li>
    </div>
    <div> 
        <form action="./modifier-rendezvous.php" method="post">
            <input type="hidden" name="idPatient" value="">
            <input type="submit" value="Modifier le rendez-vous">
        </form>
    </div>

    <a href="./liste-rendezvous.php">Retour à la liste des rendez-vous </a>

</body>

</html>