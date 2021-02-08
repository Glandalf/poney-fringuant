<?php

    include('headers.php'); 
    include('bdd.php');


    // On vérifie que l'utilisateur est bien connecté, sinon on lui renvoie une erreur 403 Forbidden

    if(empty($_SESSION['pseudo'])) {
        http_response_code(403);
        exit; 
    }

    $filtre = false; 
    // On regarde s'il existe un champ de recherche (la méthode est GET) 
    if(!empty($_GET['pseudo'])) {
        // Un utilisateur est recherché 
        $filtre = $_GET['pseudo'];
    }


    // On prépare une requête :
    /*$rqt = "SELECT prenom, a.nom, pseudo, dateAdhesion, titre, photo, description, i.interetID, i.nom as interet
            FROM adherents AS a LEFT JOIN profils AS p ON a.adherentID = p.adherentID 
                                LEFT JOIN interetAdherent AS ia ON  a.adherentID = ia.adherentID 
                                LEFT JOIN interets AS i ON  ia.centreInteretID = i.interetID 
    ";
    */

    // On va récupérer dans un premier temps tous les utilisateurs
    $rqt = "SELECT a.adherentID, prenom, a.nom, pseudo, dateAdhesion, titre, photo, description
    FROM adherents AS a LEFT JOIN profils AS p ON a.adherentID = p.adherentID ";
    // Pour chaque utilisateur, on récupérera ces centres d'intérêts (pas optimale, une bonne jointure est préférable, mais les résultats plus ennyeux à traiter)

    if($filtre) {
        // On rajoute le filtre 
        $rqt .= " WHERE UPPER(pseudo)=UPPER(:filtre) OR UPPER(email)=UPPER(:filtre) OR UPPER(a.nom)=UPPER(:filtre) ";
    }
    $rqt .= " ORDER BY pseudo ";
   

    $rqtInterets = "SELECT interetID, nom as interet
                        FROM interetAdherent AS ia
                        LEFT JOIN interets AS i ON  centreInteretID = i.interetID 
                        WHERE ia.adherentID = :id";

    try {
         //On prépare la requête
        $requetePreparee = $connexion->prepare($rqt); 
        if($filtre) {
            // On 'bind' le paramètre de recherche
            $requetePreparee->bindParam("filtre", $filtre);
        }
        // On execute la requête
        $requetePreparee->execute(); 
        $results = $requetePreparee->fetchAll(PDO::FETCH_ASSOC);
        
        $requeteInteretPreparee = $connexion->prepare($rqtInterets); 
        $i=0; 
        foreach($results as $ligne) {
            // Pour chaque utilisateur, on cherche leur centres d'intérêts (vraiment pas optimale comme solution)
            $id = $ligne["adherentID"]; 
            $requeteInteretPreparee->bindParam("id", $id);
            $requeteInteretPreparee->execute(); 
            $interets = $requeteInteretPreparee->fetchAll(PDO::FETCH_ASSOC);
            $results[$i]["centresInterets"] = $interets;
            $i++;
        }
        // On envoie et on est content (enfin pas trop trop parcequ'il faut faire le front maintenant ;) 
        echo json_encode($results);


    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode($e->getMessage());
        exit;
    }
