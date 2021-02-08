<?php
include('headers.php');

session_start();
$pseudo = $_SESSION['pseudo'];

echo json_encode([
    'connected' => 'true',
    'pseudo' => $pseudo,
    'avatar' => ""
]);
