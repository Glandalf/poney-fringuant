<?php

include('bdd.php');
include('headers.php');
/* 
    On peut vérifier que les variables attendues 
    dans la doc sont bien envoyées par le front :
*/
    
// echo $_POST['id'] . '\n';
// echo $_POST['prenom'] . '\n';
// echo $_POST['nom'] . '\n';
// echo $_POST['pseudo'] . '\n';
// echo $_POST['password'] . '\n';
// echo $_POST['email'] . '\n';
// echo $_POST['numero'] . '\n';
// echo $_POST['adresse1'] . '\n';
// echo $_POST['codePostal'] . '\n';
// echo $_POST['ville'] . '\n';
// echo $_POST['dateAdhesion'] . '\n';


// TODO: voir si c'est nécessaire pour utiliser la co créée dans bdd.php
global $connexion;

$id = $_POST['id'];
$prenom = $_POST['prenom'];
$nom = $_POST['nom'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];
$email = $_POST['email'];
$numero = $_POST['numero'];
$adresse1 = $_POST['adresse1'];
$codePostal = $_POST['codePostal'];
$ville = $_POST['ville'];
$dateAdhesion = $_POST['dateAdhesion'];

$hash = password_hash($password, PASSWORD_DEFAULT); 

$rqt = "INSERT INTO adherents 
    (prenom, nom, pseudo, `password`, email, numero, adresse1, codePostal, ville, dateAdhesion)
    VALUES (:prenom, :nom, :pseudo, :password, :email, :numero, :adresse1, :codePostal, :ville, :dateAdhesion)";


try {
    $statement = $connexion->prepare($rqt);
    $statement->bindParam(':prenom', $prenom);
    $statement->bindParam(':nom', $nom);
    $statement->bindParam(':pseudo', $pseudo);
    $statement->bindParam(':password', $hash);
    $statement->bindParam(':email', $email);
    $statement->bindParam(':numero', $numero);
    $statement->bindParam(':adresse1', $adresse1);
    $statement->bindParam(':codePostal', $codePostal);
    $statement->bindParam(':ville', $ville);
    $statement->bindParam(':dateAdhesion', $dateAdhesion);
    $statement->execute();
    if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    }
    $_SESSION['id'] = $connexion->lastInsertId();
    $_SESSION['prenom'] = $prenom;
    $_SESSION['nom'] = $nom;
    $_SESSION['pseudo'] = $pseudo;
    $_SESSION['password'] = $password;
    $_SESSION['email'] = $email;
    $_SESSION['numero'] = $numero;
    $_SESSION['adresse1'] = $adresse1;
    $_SESSION['codePostal'] = $codePostal;
    $_SESSION['ville'] = $ville;
    $_SESSION['dateAdhesion'] = $dateAdhesion;

    // $id = $connexion->lastInsertId();
    // echo '{"status": "ok", "description": "En cours. Votre identifiant est le ' . $id . '"}';
    
    // Gestion des sessions 
    // session_start(); 
    $_SESSION['id'] = $connexion->lastInsertId(); 
    $_SESSION['pseudo'] = $pseudo; 
    
    echo '{"status": "ok", "description": "Vous êtes bien inscrit !"}';
}
catch (Exception $exception) {
    echo json_encode($exception);
}
