<?php
session_start();
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
    $pdo->exec("INSERT INTO connect ( numRue, nomRue, cp, ville, pays) VALUES ('".$numRue."', '".$nomRue."', '".$cp."', '".$ville."', '".$pays."')");
    $pdo = null;
}

function addAuPanier($idProduit, $quantite) {
    $pdo = connectBDD();
    $pdo->exec("INSERT INTO panier ( nombre, id_produit, id_connect) VALUES ('".$quantite."', '".$idProduit."', '".$_SESSION['id']."')");
    $pdo = null;
}

function affichPanier() {
    $pdo = connectBDD();
    $rows = $pdo->query("SELECT * FROM panier INNER JOIN produit ON panier.id_produit = produit.id_produit WHERE panier.id_connect='".$_SESSION['id']."'");
    $error = "Panier Vide";
    $boolError = false;
    $tabBDD = array();
    while ($row = $rows->fetch()){
        $tabLigneBdd = array($row['id_produit'], $row['saveur'], $row['url_img'], $row['nombre']);
        array_push($tabBDD, $tabLigneBdd);
        $error = "WP";
        $boolError = true;
    }

    var_dump($boolError);
    var_dump($tabBDD);
    return $tabBDD;

}

$login = "Babouch";
$mdp = "1234";
$firstName = "titi";
$lastName = "Dupont";
$email = "ti.dut@ail.com";
$numRue = 4;
$nomRue = "Rue du pre";
$cp = "44310";
$ville = "Tourcoing";
$pays = "France";

$idProduit = 3;
$quantite = 50;

//creerCompte($login, $mdp, $firstName, $lastName, $email);

echo seConnecter($login, $mdp)[1];

addAuPanier($idProduit, $quantite);
$tab = affichPanier();
var_dump($tab);
