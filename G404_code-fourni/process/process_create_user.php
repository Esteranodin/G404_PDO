<?php

require_once '../utils/connect_db.php';


// INSERER ICI validation du formulaire





$sql = "INSERT INTO utilisateur (nom, prenom)
 VALUES (:nom, :prenom)";

try {
    $stmt = $pdo->prepare($sql);
    $users = $stmt->execute([
        ':nom' => $_POST["nom"],
        ':prenom' => $_POST["prenom"]
    ]); // ou fetch si vous savez que vous n'allez avoir qu'un seul résultat




} catch (PDOException $error) {
    echo "Erreur lors de la requete : " . $error->getMessage();
}


header("Location: ../index.php");
exit;