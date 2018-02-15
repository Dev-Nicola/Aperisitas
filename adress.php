<?php
session_start();

function createAdress($streetnumber, $streetname, $postalcode, $city, $country){
    $error = '';

    //var_dump (is_numeric($streetnumber));
    //var_dump (is_numeric($postalcode));


    if (!is_numeric($streetnumber)){
    $error = 'Utilisez UNIQUEMENT des chiffres pour le numéro de rue!';
    trigger_error($error, E_USER_ERROR);
    } elseif(!is_numeric($postalcode)){
        $error = 'Utilisez UNIQUEMENT des chiffres pour le code postal!';
        trigger_error($error, E_USER_ERROR);
    }

    if (empty(($streetnumber) || ($streetname) || ($postalcode) || ($city) || ($country))) {
        $error = 'Vous devez remplir tous les champs du formulaire!';
        trigger_error($error, E_USER_ERROR);
    }
}

createAdress($_POST['streetnumber'], $_POST['streetname'], $_POST['postalcode'], $_POST['city'], $_POST['country']);