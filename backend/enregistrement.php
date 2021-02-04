<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

echo "{'status': 'bof', 'description': 'cette fonctionnalité n\'est pas encore codée !!'}";
