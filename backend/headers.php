<?php
    /**
     * 
     * Fichier contenant les entêtes pour les réponses HTTP
     * 
     */
    // On va récupérer l'url du front depuis une variable d'environnement
    // pour en créer une sous linux : 
    //export FRONTURL="http://www.poney.local"
    $frontUrl = getenv("FRONTURL") ? getenv("FRONTURL") : "http://www.poney.local"; // On met une valeur par défaut si la variable d'environnement n'existe pas 
    header('Access-Control-Allow-Orgin:' . $frontUrl);
    header('Content-Type: application/json');