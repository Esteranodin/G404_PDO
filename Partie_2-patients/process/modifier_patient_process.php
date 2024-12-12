<?php

require_once '../utils/connect.php';



if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../modifier-patient.php');
    return;
}


if (
    !isset(
        $_POST['lastName'],
        $_POST['firstName'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail'],
        $_POST['idPatient']
    )
) {
    header('location: ../modifier-patient.php?error=1');
    return;
}

if (
    empty($_POST['lastName']) ||
    empty($_POST['firstName']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['phone']) ||
    empty($_POST['mail']) ||
    empty($_POST['idPatient'])
) {
    header('location: ../modifier-patient.php?error=2');
    return;
}

// input sanitization
$lastName = htmlspecialchars(trim($_POST['lastName']));
$firstName = htmlspecialchars(trim($_POST['firstName']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$phone = htmlspecialchars(trim($_POST['phone']));
$mail = htmlspecialchars(trim($_POST['mail']));
$id = htmlspecialchars(trim($_POST['idPatient']));

$sql = "UPDATE `patients` SET `lastname` = :lastname, `firstname` = :firstname, `birthdate` = :birthdate, `phone` = :phone, `mail` = :mail WHERE `patients`.`id` = :id";

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':lastname' => $lastName,
        ':firstname' => $firstName,
        ':birthdate' => $birthdate,
        ':phone' => $phone,
        ':mail' => $mail,
        ':id' => $id,
        
    ]); 

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}

header('Location: ../liste-patients.php');