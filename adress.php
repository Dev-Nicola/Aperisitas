<?php
session_start();

function createAdress($streetnumber, $streetname, $postalcode, $city, $country){
    $error = '';

    if (!is_numeric($streetnumber)){
    $error = 'Utilisez UNIQUEMENT des chiffres pour le numéro de rue!';
    } elseif(!is_numeric($postalcode)){
        $error = 'Utilisez UNIQUEMENT des chiffres pour le code postal!';
    }

    if (empty(($streetnumber) || ($streetname) || ($postalcode) || ($city) || ($country))) {
        $error = 'Vous devez remplir tous les champs du formulaire!';
    }

    return $error;
}

if(empty($_POST['streetnumber'])) {
    $message_error = createAdress('', '', '', '','');

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}

//createAdress($_POST['streetnumber'], $_POST['streetname'], $_POST['postalcode'], $_POST['city'], $_POST['country']);

function lengthPassword($password){
    $error = '';
    $password = (string)$password;

    if(strlen($password) < 12 && !empty($password)){
        $error = 'Votre mot de passe est trop court. Veuillez entrer un mot de passe de 12 caractères ou plus.';
    } elseif (empty($password)){
        $error = 'Vous devez entrer un mot de passe!';
    } elseif (!preg_match('/0123456789/',$password)){
        $error = 'Votre mot de passe doit contenir au moins un chiffre.';
    }

    return $error;
}

if(empty($_POST['password'])) {
    $message_error = lengthPassword('');

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}

lengthPassword($_POST['password']);