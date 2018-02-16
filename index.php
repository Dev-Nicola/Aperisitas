<?php
session_start();

$prix = 0;

?>
<!DOCTYPE html>
<html lang="en">

<head>


    <!-- APERISITAS -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>IssouGang - Aperisitas</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

    <!-- Plugin CSS -->
    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">

    <!-- NOS SCRIPTS -->
    <script src="Ronan/script.js" type="text/javascript"></script>

    <script type="text/javascript">
        $('#cart').on('hide.bs.modal', function (event) {
            alert('ferme le modal');
        });
    </script>

</head>

<body id="page-top" onload="calcPrixTotal()">


<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            ISSOUGANG</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse pull-right" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#produits">Produits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#issou">Apérisitas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
                </li>
            </ul>
        </div>
        <!-- LOG IN BUTTON -->
        <a class="fa fa-user fa-2x mb-1" aria-hidden="true" href="#" data-toggle="modal"
           data-target=".login-register-form"></a>

        <!-- SHOP BUTTON -->
        <a class="fa fa-shopping-cart fa-2x mb-1" aria-hidden="true" href="#" data-toggle="modal"
           data-target=".shopModal">

            <div id="notif">
                <p><?php echo count($_SESSION['panier']) ?></p>
            </div>

        </a>






    </div>
</nav>


<?php if (isset($_SESSION['errorAdd'])) {
    unset($_SESSION['errorAdd'])
    ?>
    <div id="alert" class="alert alert-success alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <h3><strong>C'est vraiment génial !!</strong></h3>
        <h3>Merci pour votre commande ! :D</h3>
    </div>
<?php } ?>


<!-- LOGIN -->
<!-- Trigger the modal with a button -->

<div class="container modalForm">
    <div class="row">


        <!-- Login / Register Modal-->

        <!-- MODAL -->
        <div class="modal fade login-register-form" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <?php
                    if (!isset($_SESSION['id'])) {
                        ?>
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span class="glyphicon glyphicon-remove"></span>
                            </button>
                            <ul class="nav nav-tabs">
                                <div id="seConnecter">
                                    <li class="active">
                                        <a data-toggle="tab" href="#login-form">


                                            <!-- HOME MODAL -->
                                            <h4 class="modal-title ">Se connecter</h4> <span
                                                    class="glyphicon glyphicon-user"></span></a>
                                    </li>
                                </div>
                                <li>
                                    <a data-toggle="tab" href="#registration-form">
                                        <div id="sinscrire">
                                            <h4 class="modal-title">S'inscrire</h4>
                                        </div>
                                        <span class="glyphicon glyphicon-pencil"></span></a>
                                </li>
                            </ul>
                        </div>


                        <!-- SE CONNECTER -->
                        <div class="modal-body">
                            <div class="tab-content">
                                <div id="login-form" class="tab-pane fade in active">

                                    <form action="php/traitmentConnect.php" method="post">
                                        <?php
                                        if (isset($_SESSION['message_error'])) {
                                            $error = $_SESSION['message_error'];

                                            unset($_SESSION['message_error']);
                                        }
                                        if (isset($error)): ?>
                                            <div class="alert alert-warning" role="alert">
                                                <?php echo $error ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="form-group">
                                            <label for="pseudo">Pseudo :</label>
                                            <input type="text" class="form-control" id="pseudo"
                                                   placeholder="Entre ton pseudo"
                                                   name="pseudo">
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe :</label>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="Entre ton password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-default">Se connecter</button>
                                    </form>
                                </div>


                                <!-- S'INSCRIRE -->
                                <div id="registration-form" class="tab-pane fade">
                                    <?php
                                    if (isset($_SESSION['message_error'])) {
                                        $error = $_SESSION['message_error'];

                                        unset($_SESSION['message_error']);
                                    }
                                    if (isset($error)): ?>
                                        <div class="alert alert-warning" role="alert">
                                            <?php echo $error ?>
                                        </div>
                                    <?php endif; ?>

                                    <form action="php/traitmentLogin.php" method="post">
                                        <div class="form-group">
                                            <label for="username">Pseudo</label>
                                            <input type="text" class="form-control" id="username"
                                                   placeholder="Entre ton pseudo"
                                                   name="username">
                                        </div>
                                        <div class="form-group">
                                            <label for="firstname">Prénom :</label>
                                            <input type="text" class="form-control" id="firstname"
                                                   placeholder="Enter your name"
                                                   name="firstname">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Nom :</label>
                                            <input type="text" class="form-control" id="lastname"
                                                   placeholder="Enter your name"
                                                   name="lastname">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="newemail"
                                                   placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group">


                                            <label for="password">Mot de passe :</label>
                                            <input type="password" class="form-control" id="password"
                                                   placeholder="New password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-default">S'inscrire</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    <?php } else { ?>

                        <h3 id="tagazok"> Tagazok à toi, <strong><?php echo $_SESSION['login'] ?></strong></h3>
                        <a href="php/traitmentLogout.php" id="logout" class="btn btn-default">Se déconnecter</a>


                    <?php } ?>
                </div>
            </div>
        </div>

    </div>
</div>


<!-- SHOPPING CART -->

<div class="modal cart fade shopModal" id="cart" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <?php
            if (isset($_SESSION['panier'])) {


            ?>
            <h5 class="modal-title" id="exampleModalLabel">Votre panier</h5>

            <div class="modal-body">
                <table class="show-cart table">

                </table>


                <?php
                for ($i = 0; $i < count($_SESSION['panier']); $i++) {
                    ?>
                    <div class="products"><img src="<?php echo $_SESSION['panier'][$i][2] ?>">
                        <h3><?php echo $_SESSION['panier'][$i][1] ?></h3>
                        <p><?php echo $_SESSION['panier'][$i][5] ?></p>

                        <?php $prix += $_SESSION['panier'][$i][4] * $_SESSION['panier'][$i][3] ?>


                        <!-- MOINS -->
                        <input type="button" value="-"
                               onclick="javascript:NBmoins('<?php echo $_SESSION['panier'][$i][1] . "', '" . $_SESSION['panier'][$i][1] . "', " . true ?>)">
                        <!-- INPUT -->
                        <input type="number" value="<?php echo $_SESSION['panier'][$i][3] ?>" min="0"
                               id="<?php echo $_SESSION['panier'][$i][1] ?>"
                               name="<?php echo $_SESSION['panier'][$i][1] ?>">


                        <!-- PLUS -->
                        <input type="button" value="+"
                               onclick="javascript:NBplus('<?php echo $_SESSION['panier'][$i][1] ?>')">
                        <form action="php/traitmentDropItem.php" method="post">
                            <button name="<?php echo $_SESSION['panier'][$i][0] ?>" type="submit"
                                    class="btn btn-primary" style="font-size: 15px; margin: 20px;">Supprimer
                            </button>
                        </form>
                    </div>

                    <?php
                }

                ?>









                <!-- PRIX -->

                <div id="prix">

                    <h3>Prix total : <span id="prixTotal">0</span>€</h3><span class="total-cart"></span></div>
            </div>
            <?php } else {
            ?><h3 style="text-align: center; margin: 30px"><?php echo "Votre panier est vide"; ?></h3>
            <?php }
            ?>


            <?php if (isset($_SESSION['id'])) { ?>












            <form action="php/traitmentCommand.php" method="post">

                <?php
                if (isset($_SESSION['errorAdd'])) {
                    $error = $_SESSION['errorAdd'];

                    unset($_SESSION['errorAdd']);
                }
                if (isset($error)): ?>
                    <div class="alert alert-warning" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php endif; ?>
                <div id="livraison"><h3>Numéro de la rue</h3>
                    <input class="livraison" type="text" name="numrue" value="<?php echo $_SESSION['adresse'][0][0] ?>"
                           placeholder="Numéro de la rue">

                    <h3>Nom de la rue</h3>
                    <input type="text" class="livraison" name="nomrue" placeholder="Nom de votre rue"
                           value="<?php echo $_SESSION['adresse'][0][1] ?>">

                    <h3>Code postal</h3>
                    <input type="text" class="livraison" name="cp" placeholder="Code postal"
                           value="<?php echo $_SESSION['adresse'][0][2] ?>">

                    <h3>Ville</h3>
                    <input type="text" class="livraison" name="ville" placeholder="Ville"
                           value="<?php echo $_SESSION['adresse'][0][3] ?>">

                    <h3>Pays</h3>
                    <input type="text" class="livraison" name="pays" placeholder="Pays"
                           value="<?php echo $_SESSION['adresse'][0][4] ?>">
                </div>

                <?php } ?>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>

                    <?php if (isset($_SESSION['id'])) { ?>


                    <button type="submit" class="btn btn-primary">Passer la commande</button>

            </form>
            <form action="php/traitmentDropList.php">
                <button type="submit" class="btn btn-primary">Vider le panier</button>
            </form>


            <?php } ?>

        </div>

    </div>
</div>
</div>


<!-- Home -->

<header class="masthead text-center text-white d-flex">
    <div class="container my-auto">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <h1 class="text-uppercase">
                    <strong>VOS GOÛTS PRÉFÉRÉS SONT MAINTENANT DISPONIBLES !</strong>
                </h1>
                <hr>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">Commandez dès maintenant les magnifiques Apérisitas, aux saveurs fabuleuses !
                    <strong>Nouveau parfum : Gout Cacahuète ! Spécial OPS !</p>
                <a class="btn btn-primary btn-xl js-scroll-trigger" href="#produits">J'achète !</a>
            </div>
        </div>
    </div>
</header>


<!-- Produits -->

<section id="produits">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h2 class="section-heading">Notre gamme de produits</h2>
                <hr class="my-4">
                <div id="space"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row text-center">


            <!-- Jambon -->
            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top"
                         src="https://cac.img.pmdstatic.net/fit/http.3A.2F.2Fwww.2Ecuisineactuelle.2Efr.2Fvar.2Fcui.2Fstorage.2Fimages.2Frecettes-de-cuisine.2Frecettes-pour-tous.2Ffamiliale.2Fchiffonnade-de-jambon-cru-aux-groseilles.2F122027-2-fre-FR.2Fchiffonnade-de-jambon-cru-aux-groseilles.2Ejpg/748x372/quality/80/crop-from/center/chiffonnade-de-jambon-cru-aux-groseilles.jpeg"
                         alt="">
                    <div class="card-body">
                        <h4 class="card-title">Jambon</h4>
                        <p class="card-text">De délicieux fromages, goût jambon, à la texture fondantes pour un apéritif
                            convivial en famille.</p>
                    </div>
                    <div class="card-footer">


                        <form action="php/traitement.php" method="post">


                            <!-- J'ACHETE -->
                            <button type="submit" class="btn btn-primary">J'achète !</button>

                            <input type="number" min="1" placeholder="1" name="1">
                        </form>
                    </div>

                </div>
            </div>

            <!-- Ail et Fines Herbes -->

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top"
                         src="https://static.cuisineaz.com/610x610/i93155-chantilly-salee-a-l-ail-et-fines-herbes.jpg"
                         alt="">
                    <div class="card-body">
                        <h4 class="card-title">How High et fine herbes</h4>
                        <p class="card-text">Les Incraquables, leurs goûts trop bons sont à partager avec toute la
                            famille !</p>
                    </div>
                    <div class="card-footer">

                        <form action="php/traitement.php" method="post">


                            <!-- J'ACHETE -->
                            <button type="submit" class="btn btn-primary">J'achète !</button>

                            <input type="number" min="1" placeholder="1" name="2">
                        </form>
                    </div>
                </div>
            </div>


            <!-- Salade Tomates Oignons -->

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top"
                         src="https://cac.img.pmdstatic.net/fit/http.3A.2F.2Fwww.2Ecuisineactuelle.2Efr.2Fvar.2Fcui.2Fstorage.2Fimages.2Frecettes-de-cuisine.2Fentree.2Fsalades.2Fsalade-tomate-oignon-281673.2F3325520-1-fre-FR.2Fsalade-tomate-oignon.2Ejpg/1200x600/crop-from/center/salade-tomate-oignon.jpg"
                         alt="">
                    <div class="card-body">
                        <h4 class="card-title">Salade Tomates Oignons</h4>
                        <p class="card-text">Inclus des sauces Samouraï et Blanches, chef ! Sur place ou à emporter
                            ?</p>
                    </div>
                    <div class="card-footer">


                        <form action="php/traitement.php" method="post">


                            <!-- J'ACHETE -->
                            <button type="submit" class="btn btn-primary">J'achète !</button>

                            <input type="number" min="1" placeholder="1" name="3">
                        </form>
                    </div>
                </div>
            </div>


            <!-- Cacahuete -->

            <div class="col-lg-3 col-md-6 mb-4">
                <div class="card">
                    <img class="card-img-top"
                         src="https://www.espace-musculation.com/wp-content/uploads/2013/04/beurre-cacahuete.jpg"
                         alt="">
                    <div class="card-body">
                        <h4 class="card-title">Cacahuète</h4>
                        <p class="card-text">Les Incraquables, leurs goûts trop bons sont à partager avec toute la
                            famille !</p>
                    </div>
                    <div class="card-footer">

                        <form action="php/traitement.php" method="post">


                            <!-- J'ACHETE -->
                            <button type="submit" class="btn btn-primary">J'achète !</button>

                            <input type="number" min="1" placeholder="1" name="4">
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Notre entreprise -->

<section class="bg-primary" id="issou">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading text-white">Viens chercher bonheur !</h2>
                <hr class="light my-4">
                <p class="text-faded mb-4">Salut, c'est Issou ! Tu veux des Apérisitas pas cher ? On sait déjà que tu
                    nous aimes beaucoup, On te propose que tu ailles dans une supérette et que tu achètes Apétisitas
                    chez ton marchand préféré. Tu mets Apérisitas dans ta bouche et c'est bonheur tout de suite ! C'est
                    un pack de 50 fromages ! 50 FROMAGES ! Tu te sens bien dans ta tête, tu te sens bien dans ton corps,
                    va chercher bonheur chez ton marchand, va, va !</p>
            </div>
        </div>
    </div>
</section>


<!-- Contact -->

<section id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mx-auto text-center">
                <h2 class="section-heading">Il est pas frais ton fromage ?</h2>
                <hr class="my-4">
                <p class="mb-5">COMMENT CA, IL EST PAS FRAIS, MON FROMAGE ?? VIENS, ENVOIES MOI UN MAIL OU APPELLES MOI
                    QUE JE TE MONTRE COMMENT QU'IL EST FRAIS, MON FROMAGE !!</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 ml-auto text-center">
                <i class="fa fa-phone fa-3x mb-3 sr-contact"></i>
                <p>01-23-45-67-89</p>
            </div>
            <div class="col-lg-4 mr-auto text-center">
                <i class="fa fa-envelope-o fa-3x mb-3 sr-contact"></i>
                <p>
                    <a href="mailto:your-email@your-domain.com">ilestpasfrais@monfromage.com</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Plugin JavaScript -->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="vendor/scrollreveal/scrollreveal.min.js"></script>
<script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

<!-- Custom scripts for this template -->
<script src="js/creative.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</body>

</html>
