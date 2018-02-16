<?php
session_start();


include "scriptBDD.php";

if (empty($_POST['pseudo'] || $_POST['password'])) {
    $error = "Tous les champs doivent être remplis";
} elseif (empty($_POST['pseudo'] && $_POST['password'])) {
    $error = "Tous les champs doivent être remplis";

} else {
    $mdp = md5($_POST['password']);
    $error = seConnecter($_POST['pseudo'], $mdp, $_POST['password'])[1];
    $_SESSION['adresse'] = getAdress();
    $_SESSION['panier'] = affichPanier();
}
$_SESSION['message_error'] = $error;
header('Location: ../index.php');