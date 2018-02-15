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
    } elseif (!empty( ($streetname) || ($city) || ($country))){
        $arrayForm = array($streetname, $city, $country);
        foreach($arrayForm as $elementForm){
            if(ctype_digit($elementForm)){
                $error = 'Vous ne pouvez pas pas utiliser de chiffres dans les cases "nom de rue", "nom de ville" et 
                nom de pays"';
            }
        }
    }

    return $error;
}

if(!empty($_POST['streetnumber'] || $_POST['streetname'] || $_POST['postalcode'] || $_POST['city'] || $_POST['country'])) {
    $message_error = createAdress($_POST['streetnumber'], $_POST['streetname'],$_POST['postalcode'], $_POST['city'], $_POST['country']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
} elseif(empty($_POST['streetnumber'] || $_POST['streetname'] || $_POST['postalcode'] || $_POST['city'] || $_POST['country'])) {
    $message_error = createAdress($_POST['streetnumber'], $_POST['streetname'], $_POST['postalcode'], $_POST['city'], $_POST['country']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}



function lengthPassword($password){
    $error = '';
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

if(!empty($_POST['password']) || $_POST['password']){
    $message_error = lengthPassword($_POST['password']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
} elseif(empty($_POST['password']) || $_POST['password']) {
    $message_error = lengthPassword($_POST['password']);

    $_SESSION['message_error'] = $message_error;
    header('Location: form.php'); // changer selon la page du formulaire
}