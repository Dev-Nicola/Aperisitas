<?php
session_start();

include "scriptBDD.php";

    if (isset($_POST)) {
        addAuPanier(key($_POST), $_POST[(key($_POST))]);
    }


    $_SESSION['panier'] = affichPanier();
header("Location: ../index.php#produits");