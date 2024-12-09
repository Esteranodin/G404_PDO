// process/default_form_process.php

<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../index.php');
    // redirige quand le code est terminé VS instantanément, il faudra mettre un return après header
    return;
}

if (
    !isset(
        $_POST['firstName'],
        $_POST['lastName'],
        $_POST['age'],
        $_POST['email'],
        $_POST['password']
    )
) {
    header('location: ../index.php?error=1'); 
    return;
}

if (
    empty($_POST['firstName']) ||
    empty($_POST['lastName']) ||
    empty($_POST['age']) ||
    empty($_POST['email']) ||
    empty($_POST['password'])
) {
    header('location: ../index.php?error=2');
    return;
}

// input sanitization
$firstName = htmlspecialchars(trim($_POST['firstName']));
$lastName = htmlspecialchars(trim($_POST['lastName']));
$age = htmlspecialchars(trim($_POST['age']));
$email = htmlspecialchars(trim($_POST['email']));
$password = htmlspecialchars(trim($_POST['password']));


// a remplir en fonction de vos prerequis
if(
    strlen($firstName) > 50 ||
    strlen($lastName) > 50 ||
    $age > 120 ||
    $age < 0
) {
    // redirection si c'est pas bon
}

// optionnel regex
// if (!preg_match('[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]', $email)) {
//     die("l'email est pas conforme");
// }

// etc .......


// mon code une fois que toute les données sont bonnes

header('location: ../compte_creer.php?firstName=' . $firstName . '&lastName=' . $lastName);
