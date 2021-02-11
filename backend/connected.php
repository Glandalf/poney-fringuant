<?php
    include('headers.php');
    //if(session_status() != PHP_SESSION_ACTIVE) {
        session_start(); 
    //}

    if(!empty($_SESSION['pseudo'])) {
        echo json_encode([
            "connected" => true, 
            "pseudo" => $_SESSION['pseudo'], 
            "nom" => $_SESSION['nom'], 
            "prenom" => $_SESSION['prenom'], 
            "dateAdhesion" => $_SESSION['dateAdhesion'], 
            "numero" => $_SESSION['numero'], 
            "adresse" => $_SESSION['adresse1'], 
            "cp" => $_SESSION['codePostal'], 
            "ville" => $_SESSION['ville'], 
            "avatar" => null]);
    } else {
        http_response_code(400);
        echo json_encode(["connected" => false, "sessionID" => session_id(), "sessionName" => session_name(), "sessionObject" => $_SESSION]);
    }
