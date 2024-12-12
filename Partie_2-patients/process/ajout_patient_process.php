<?php

require_once '../utils/connect.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../ajout-patient.php');
    return;
}

if (
    !isset(
        $_POST['lastName'],
        $_POST['firstName'],
        $_POST['birthdate'],
        $_POST['phone'],
        $_POST['mail']
    )
) {
    header('location: ../ajout-patient.php?error=1');
    return;
}

if (
    empty($_POST['lastName']) ||
    empty($_POST['firstName']) ||
    empty($_POST['birthdate']) ||
    empty($_POST['phone']) ||
    empty($_POST['mail'])
) {
    header('location: ../ajout-patient.php?error=2');
    return;
}

// input sanitization
$lastName = htmlspecialchars(trim($_POST['lastName']));
$firstName = htmlspecialchars(trim($_POST['firstName']));
$birthdate = htmlspecialchars(trim($_POST['birthdate']));
$phone = htmlspecialchars(trim($_POST['phone']));
$mail = htmlspecialchars(trim($_POST['mail']));


$sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
 VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
       ':lastname' => $lastName,
        ':firstname' => $firstName,
        ':birthdate' => $birthdate,
        ':phone' => $phone,
        ':mail' => $mail,
        
    ]); 

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header('location: ./compte_create.php?lastName=' . $lastName . '&firstName=' . $firstName);
exit;
