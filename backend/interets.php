<?php

    include('bdd.php'); 
    include('headers.php'); 
    // Gestion des centres d'interêts des utilisateurs  

    // Route protégée : l'uitlisateur doit être connecté pour y accéder : 
    session_start();
    if(empty($_SESSION["pseudo"]))  {
        http_response_code(403);
        echo json_encode(["status" => "KO", "description" => "L'utilisateur n'est pas connecté"]);
        exit; 
    }


    if($_SERVER['REQUEST_METHOD'] == 'GET') { // On renvoi la liste des centres d'intérêts
        $rqt = "SELECT * FROM interets";
        $stmt = $connexion->prepare($rqt); 
        $stmt->execute(); 
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($results);
        exit;
    }


    if($_SERVER['REQUEST_METHOD'] == 'POST') { // On met à jour la liste des centres d'intérêts de l'utilisateur connecté
        $userId = $_SESSION["id"];
       
        // On récupère la liste des centres d'interêts  que l'utilisateur a choisi : 
        // Soit un tableua d'objets JSON,  (on vérifie le Content-Type pour le savoir)
        $contentType = getallheaders()["Content-Type"];
        $interets = array(); 
        if( $contentType == "application/json") {
            // On traite un objet JSON
            echo json_encode('');
        } else {
            // On considère que le front nous a renvoyé des checkbox. 
            

            if(!empty($_POST["interets"])) {
                // Le formulaire 
                $interets = $_POST["interets"];
            }
        }
        
        
        $rqt = "INSERT INTO interetAdherent(centreInteretID, adherentID) VALUES (:interetid, :userid) " ;
        try {
            $stmt = $connexion->prepare($rqt); 
            foreach($interets as $i ) {
                $stmt->bindParam("interetid", $i);
                $stmt->bindParam("userid", $userId);
                $stmt->execute();
            }
        } catch (Exception $e) {
            http_response_code(500);
            echo json_encode($e->getMessage());
            exit;
        }
        echo json_encode(["status" => "ok", "description" => "Les liste des centres d'intérêts à été mise à jour"]);

    }


