<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/* 
    On peut vérifier que les variables attendues 
    dans la doc sont bien envoyées par le front :
*/
echo $_POST['prenom'];
echo $_POST['pseudo'];
echo $_POST['numero'];
