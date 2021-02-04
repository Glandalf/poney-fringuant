<?php
    /**
     * Fichier contenant les informations nécessaire pour la connexion à la BDD
     */
    // On pourrait aussi utiliser des variables d'environnement
    // Ou un fichier fichier .ini
    $db_url="mysql:host=localhost;dbname=poney";
    $db_user = "toto";
    $db_pass = "super secret" ;

    // Connexion à la bdd
    $connexion = new PDO($db_url, $db_user, $db_pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     // pour afficher les erreurs dans le catch
