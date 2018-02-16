<?php
session_start();


include "scriptBDD.php";

if (isset($_POST)) {
    dropLignePanier(key($_POST));
}


$_SESSION['panier'] = affichPanier();
header("Location: ../index.php#produits");