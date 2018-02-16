<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Aperisitas panier</title>
</head>

<body>

<?php
$aperisitasJambonImg = "https://mastodon.social/emoji/1f437.svg";
$aperisitasJambonText = "Aperisitas Jambon";
$aperisitasJambon = array($aperisitasJambonImg,$aperisitasJambonText);

$aperisitasCacahueteImg = "https://images.emojiterra.com/twitter/512px/1f95c.png";
$aperisitasCacahueteText = "Aperisitas Cacahuète";
$aperisitasCacahuete = array($aperisitasCacahueteImg,$aperisitasCacahueteText);

$aperisitasHFHImg = "http://www.very-pratique.fr/wp-content/themes/simple/images/categ/aromates.svg";
$aperisitasHFHText = "Aperisitas High et fines herbes";
$aperisitasHFH = array($aperisitasHFHImg,$aperisitasHFHText);

$aperisitasSTOImg = "https://images.emojiterra.com/emojione/v2/512px/1f345.png";
$aperisitasSTOText = "Aperisitas Salade Tomates Oignon";
$aperisitasSTO = array($aperisitasSTOImg,$aperisitasSTOText);

$nbAperisitas = array($aperisitasJambon,$aperisitasCacahuete,$aperisitasHFH,$aperisitasSTO);

if (!empty($_POST["nbJambon"])) {
    $jambon = true;
}
else {
    $jambon = false;
}


if (!empty($_POST["nbCacahuete"])) {
    $cacahuete = true;
}
else {
    $cacahuete = false;
}


if (!empty($_POST["nbHFH"])) {
    $HFH = true;
}
else {
    $HFH = false;
}


if (!empty($_POST["nbSTO"])) {
    $STO = true;
}
else {
    $STO = false;
}

?>
<form action="paye.php" method="post" id="form">
    <?php if($jambon == true) :?>
        <div class="container" id="Jambon">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10" id="aperiRond">
                    <img src="<?php echo $nbAperisitas[0][0] ?>" id="aperisitasImg">
                    <p id="nom"><?php echo $nbAperisitas[0][1]?></p>
                    <input type="button" value="-" onclick="javascript:NBmoins('nbJambon','Jambon',true)" id="-">
                    <input type="text" id="nbJambon" name="nbJambon" value="<?php echo $_POST["nbJambon"] ?>">
                    <input type="button" value="+" onclick="javascript:NBplus('nbJambon')">
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if($cacahuete == true) :?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10" id="aperiRond">
                    <img src="<?php echo $nbAperisitas[1][0] ?>" id="aperisitasImg">
                    <p id="nom"><?php echo $nbAperisitas[1][1]?></p>
                    <input type="button" value="-" onclick="javascript:NBCACAHUETEmoins(true)">
                    <input type="text" id="nbCacahuete" name="nbCacahuete" value="<?php echo $_POST["nbCacahuete"] ?>">
                    <input type="button" value="+" onclick="javascript:NBCACAHUETEplus()">
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if($HFH == true) :?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10" id="aperiRond">
                    <img src="<?php echo $nbAperisitas[2][0] ?>" id="aperisitasImg">
                    <p id="nom"><?php echo $nbAperisitas[2][1]?></p>
                    <input type="button" value="-" onclick="javascript:NBHFHmoins(true)">
                    <input type="text" id="nbHFH" name="nbHFH" value="<?php echo $_POST["nbHFH"] ?>">
                    <input type="button" value="+" onclick="javascript:NBHFHplus()">
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if($STO == true) :?>
        <div class="container" id="nbSTO">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10" id="aperiRond">
                    <img src="<?php echo $nbAperisitas[3][0] ?>" id="aperisitasImg">
                    <p id="nom"><?php echo $nbAperisitas[3][1]?></p>
                    <input type="button" value="-" onclick="javascript:NBSTOmoins(true)">
                    <input type="text" id="nbSTO" name="nbSTO" value="<?php echo $_POST["nbSTO"] ?>">
                    <input type="button" value="+" onclick="javascript:NBSTOplus()">
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    <?php endif ?>
    <?php if (empty($_POST["nbJambon"]) && empty($_POST["nbCacahuete"]) && empty($_POST["nbHFH"]) && empty($_POST["nbSTO"])):?>
        <div class="container">
            <div class="row">
                <div class="col-sm-1">
                </div>
                <div class="col-sm-10" id="aperiRond">
                    <p>Votre panier est vide</p>
                </div>
                <div class="col-sm-1">
                </div>
            </div>
        </div>
    <?php endif ?>
    <input type="submit" value="Acheter" width="auto" id="acheter">
</form>

<form action="index.php" method="post">
    <input type="submit" value="Magasin">
</form>

<script type="text/javascript" src="script.js">
</script>

</body>

</html>