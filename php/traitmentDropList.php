<?php


session_start();


include "scriptBDD.php";

dropPanier();


$_SESSION['panier'] = affichPanier();
header("Location: ../index.php#produits");