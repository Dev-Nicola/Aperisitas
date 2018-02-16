<?php
session_start();

include "scriptBDD.php";

function lengthPassword($password)
{
    $boolError = false;
    $error = 'Votre compte à bien été créé';
    $password = (string)$password;
    if (strlen($password) < 12 && !empty($password)) {
        $error = 'Votre mot de passe est trop court. Veuillez entrer un mot de passe de 12 caractères ou plus.';
        $boolError = true;
    } elseif (empty($password)) {
        $boolError = true;
        $error = 'Vous devez entrer un mot de passe!';
    } elseif (preg_match('/\\d/', $password) == false) {
        $boolError = true;
        $error = 'Votre mot de passe doit contenir au moins un chiffre.';
    }
    return array($boolError, $error);
}


$_POST['username'] = addslashes($_POST['username']);
$_POST['firstname'] = addslashes($_POST['firstname']);
$_POST['lastname'] = addslashes($_POST['lastname']);
$_POST['email'] = addslashes($_POST['email']);
$_POST['password'] = addslashes($_POST['password']);

if (empty($_POST['username'] || $_POST['firstname'] || $_POST['lastname'] || $_POST['email'] || $_POST['password'])) {
    $error = "Tous les champs doivent être remplis";
} elseif (empty($_POST['username'] && $_POST['firstname'] && $_POST['lastname'] && $_POST['email'] && $_POST['password'])) {
    $error = "Tous les champs doivent être remplis";

} else {
    $error = lengthPassword($_POST['password'])[1];

    if (lengthPassword($_POST['password'])[0] == false) {
        $mdp = md5($_POST['password']);
        $error = creerCompte($_POST['username'], $mdp, $_POST['firstname'], $_POST['lastname'], $_POST['email'])[1];
    }

}
$_SESSION['message_error'] = $error;
header('Location: ../index.php');

