<?php

require_once '../utils/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../ajout-rendezvous.php');
    return;
}

if (
    !isset(
        $_POST['date'],
        $_POST['time'],
        $_POST['idPatients'],
    )
) {
    header('location: ../ajout-rendezvous.php?error=1');
    return;
}

if (
    empty($_POST['date']) ||
    empty($_POST['time']) ||
    empty($_POST['idPatients'])
) {
    header('location: ../ajout-rendezvous.php?error=2');
    return;
}

// input sanitization necessaire si format imposé par type du form ? 
// $dateHour = htmlspecialchars(trim($_POST['dateHour']));
// $idPatients = htmlspecialchars(trim($_POST['idPatients']));

$sql = "INSERT INTO appointments (dateHour, idPatients)
 VALUES (:dateHour, :idPatients)";
$dateHour = $_POST['date'] . " " . $_POST['time']; // pour correspondre écirture base de donnée qui à une seule variable SQL pour date + espace + heure

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':dateHour' => $dateHour,
        ':idPatients' => $_POST['idPatients']
    ]);

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header('location: ../index.php');
exit;
