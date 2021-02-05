<?php

    include('headers.php');
    include_once('bdd.php');

    // Récupération des données de la requête HTTP (champs du formulaire)
    $pseudo = $_POST["pseudo"]; // Pseudo peut contenir le pseudo ou l'email ou le numéro d'adhérent de l'utilisateur
    $password = $_POST["password"]; 

    // Préparation de la requête SQL
    $requete = "SELECT adherentID, pseudo, password FROM adherents WHERE pseudo=:input OR email=:input OR numero=:input LIMIT 1";

    // Éxcution de la requête
    try {
        $requetePreparee = $connexion->prepare($requete);
        $requetePreparee->bindParam("input", $pseudo); 
        $requetePreparee->execute(); 
        $resultat = $requetePreparee->fetch(PDO::FETCH_ASSOC);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode($e->getMessage());
        exit;
    }

    // Récupération du mot de passe dans les résultats
    $hash = $resultat['password']; 

    // Vérification du mot de passe
    if(password_verify($password, $hash)) {
        // Ok  on connecte l'utilisateur
        session_start(); 
        $_SESSION['pseudo'] = $resultat['pseudo']; 
        $_SESSION['id'] = $resultat['adherentID']; 
        echo json_encode(["status" => "ok", "connected" => true, "pseudo" => $_SESSION['pseudo'], "avatar" => null, "description" => "Connexion réussie", 'sessionObject' => $_SESSION]);
    } else {
        http_response_code(400); 
        echo json_encode(["status" => "ko", "connected" => false, "description" => "Pseudo ou email ou mot de passe invalide"]);
    }