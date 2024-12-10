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


// if(
//     strlen($firstName) > 50 ||
//     strlen($lastName) > 50 ||
//     $age > 120 ||
//     $age < 0
// ) {
//     // redirection si c'est pas bon
// }

// optionnel regex
// if (!preg_match('[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]', $email)) {
//     die("l'email est pas conforme");
// }

// etc .......


// mon code une fois que toute les données sont bonnes


$sql = "INSERT INTO patients (lastname, firstname, birthdate, phone, mail)
 VALUES (:lastname, :firstname, :birthdate, :phone, :mail)";

try {
    $stmt = $pdo->prepare($sql);
    $patients = $stmt->execute([
        ':lastname' => $_POST["lastName"],
        ':firstname' => $_POST["firstName"],
        ':birthdate' => $_POST["birthdate"],
        ':phone' => $_POST["phone"],
        ':mail' => $_POST["mail"]
        
    ]); 

} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header('location: ./compte_create.php?lastName=' . $lastName . '&firstName=' . $firstName);
exit;
