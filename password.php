<?php
session_start();


function lengthPassword($password){
    $error = 'Votre compte à bien été créé';
    $password = (string)$password;

    if(strlen($password) < 12 && !empty($password)){
        $error = 'Votre mot de passe est trop court. Veuillez entrer un mot de passe de 12 caractères ou plus.';
    } elseif (empty($password)){
        $error = 'Vous devez entrer un mot de passe!';
    } elseif (preg_match('/\\d/',$password) == false){
        $error = 'Votre mot de passe doit contenir au moins un chiffre.';
    }

    return $error;
}

if(!empty($_POST['password'])){
    $message_error = lengthPassword($_POST['password']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
} elseif(empty($_POST['password'])) {
    $message_error = lengthPassword($_POST['password']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}