<?php

require_once '../utils/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../ajout-rendezvous.php');
    return;
}

// if (
//     !isset(
//         $_POST['dateHour'],
//         $_POST['idPatients'],
//     )
// ) {
//     header('location: ../ajout-rendezvous.php?error=1');
//     return;
// }

// if (
//     empty($_POST['dateHour']) ||
//     empty($_POST['idPatients'])
// ) {
//     header('location: ../ajout-rendezvous.php?error=2');
//     return;
// }

// input sanitization
// $lastName = htmlspecialchars(trim($_POST['lastName']));
// $firstName = htmlspecialchars(trim($_POST['firstName']));



$sql = "INSERT INTO appointments (dateHour, idPatients)
 VALUES (:dateHour, :idPatients)";
$dateHour = $_POST['date'] . " " . $_POST['time'];

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':dateHour' => $dateHour,
        ':idPatients' => $idPatients
    ]);
} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header('location: ../index.php');
exit;
?>


