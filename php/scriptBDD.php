<?php

/**
 * Created by PhpStorm.
 * User: thoma
 * Date: 14/02/2018
 * Time: 11:17
 *      ",;;*;;;;,
 *       .-'``;-');;.
 *      /'  .-.  /*;;
 *    .'    \d    \;;               .;;;,
 *   / o      `    \;    ,__.     ,;*;;;*;,
 *   \__, _.__,'   \_.-') __)--.;;;;;*;;;;,
 *    `""`;;;\       /-')_) __)  `\' ';;;;;;
 *       ;*;;;        -') `)_)  |\ |  ;;;;*;
 *       ;;;;|        `---`    O | | ;;*;;;
 *       *;*;\|                 O  / ;;;;;*
 *      ;;;;;/|    .-------\      / ;*;;;;;
 *     ;;;*;/ \    |        '.   (`. ;;;*;;;
 *     ;;;;;'. ;   |          )   \ | ;;;;;;
 *     ,;*;;;;\/   |.        /   /` | ';;;*;
 *      ;;;;;;/    |/       /   /__/   ';;;
 *      '"*"'/     |       /    |      ;*;
 *           `""""`        `""""`     ;'"
 */

function connectBDD() {
    $host = '127.0.0.1';
    $port = '3306';
    $db = 'aperisitas';
    $login = 'root';
    $password = '';

    try {
        $pdo = new PDO('mysql:host='.$host.';port='.$port. ';dbname='.$db, $login, $password);
        $pdo->exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        var_dump($e->getMessage());
    }
    return $pdo;
}

function creerCompte($login, $mdp, $firstName, $lastName, $email) {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM connect");
    $error = "";
    $boolError = true;

    while ($row = $rows->fetch()){
        if ($row['login'] === $login) {
            $error = "Le nom d'utilisateur est déjà utilisé";
            $boolError = false;
        }
        if ($row['email'] === $email) {
            $error = "L'adresse mail est déjà utilisée";
            $boolError = false;
        }
    }
    $rows->closeCursor();

    if ($boolError == true) {
        $pdo->exec("INSERT INTO connect ( login, mdp, firstName, lastName, email) VALUES ('".$login."', '".$mdp."', '".$firstName."', '".$lastName."', '".$email."')");
        $error = "Votre compte a bien été créé";
    }


    $pdo = null;
    return array($boolError, $error);
}

function seConnecter($login, $mdp) {
    $pdo = connectBDD();

    $rows = $pdo->query("SELECT id_connect, login, mdp FROM connect WHERE login ='".$login."'");
    $error = "Pas de compte";
    $boolError = false;

    while ($row = $rows->fetch()){
        if($row['login'] == $login && $row['mdp'] == $mdp) {
            $_SESSION['logged'] = true;
            $_SESSION['id'] = $row['id_connect'];
            $_SESSION['login'] = $row['login'];
            $error = "Bien connecté";
            break;
        }
        else {
            $error = "Mauvais mdp";
            $boolError = false;
        }
    }
    $rows->closeCursor();
    $pdo = null;
    return array($boolError, $error);
}

function addAdress($numRue, $nomRue, $cp, $ville, $pays){
    $pdo = connectBDD();
    $pdo->exec("UPDATE connect SET numRue='".$numRue."', nomRue='".$nomRue."', cp='".$cp."', ville='".$ville."', pays='".$pays."' WHERE id_connect='".$_SESSION['id']."'");
    $pdo = null;
}

function getAdress() {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM connect  WHERE id_connect='".$_SESSION['id']."'");
    $boolError = false;
    $tabBDD = array();
    while ($row = $rows->fetch()){
        $tabLigneBdd = array($row['numRue'], $row['nomRue'], $row['cp'], $row['ville'], $row['pays']);
        array_push($tabBDD, $tabLigneBdd);
        $error = "WP";
        $boolError = true;
    }
    return $tabBDD;
}


function addAuPanier($idProduit, $quantite) {
    $pdo = connectBDD();
    $existDeja = false;
    $rows = $pdo->query("SELECT id_produit, nombre FROM panier WHERE id_produit ='".$idProduit."' AND id_connect='".$_SESSION['id']."'");
    while ($row = $rows->fetch()) {
        $qtt = $row['nombre'] + $quantite;
        $pdo->exec("UPDATE panier SET nombre='".$qtt."' WHERE id_produit='".$idProduit."' AND id_connect='".$_SESSION['id']."'");
        $existDeja = true;
    }
    $rows->closeCursor();
    if ($existDeja == false){
        $pdo->exec("INSERT INTO panier ( nombre, id_produit, id_connect) VALUES ('".$quantite."', '".$idProduit."', '".$_SESSION['id']."')");
    }
    $pdo = null;
}

function majPanier($idProduit, $quantite){
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT id_produit, nombre FROM panier WHERE id_produit ='".$idProduit."' AND id_connect='".$_SESSION['id']."'");
    while ($row = $rows->fetch()) {
        $pdo->exec("UPDATE panier SET nombre='".$quantite."' WHERE id_produit='".$idProduit."' AND id_connect='".$_SESSION['id']."'");
    }
    $rows->closeCursor();
}

function affichPanier() {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM panier INNER JOIN produit ON panier.id_produit = produit.id_produit WHERE panier.id_connect='".$_SESSION['id']."'");
    $error = "Panier Vide";
    $boolError = false;
    $tabBDD = array();
    while ($row = $rows->fetch()){
        $tabLigneBdd = array($row['id_produit'], $row['saveur'], $row['url_img'], $row['nombre'], $row['prix'], $row['descri']);
        array_push($tabBDD, $tabLigneBdd);
        $error = "WP";
        $boolError = true;
    }
    return $tabBDD;
}

function dropPanier() {
    $pdo = connectBDD();
    $pdo->exec("DELETE FROM panier WHERE id_connect='".$_SESSION['id']."'");
}

function dropLignePanier($idProduit) {
    $pdo = connectBDD();
    $pdo->exec("DELETE FROM panier WHERE id_connect='".$_SESSION['id']."' AND id_produit='".$idProduit."'");
    $pdo = null;
}
