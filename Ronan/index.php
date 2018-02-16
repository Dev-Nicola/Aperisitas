<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Aperisitas magasin</title>
</head>

<body>
<div>
    <p>Jambon</p>
    <input type="button" value="-" onclick="javascript:NBmoins('nbJambon','Jambon')">
    <input type="button" value="+" onclick="javascript:NBplus('nbJambon')">
</div>

<div>
    <p>Cacahuète</p>
    <input type="button" value="-" onclick="javascript:NBCACAHUETEmoins()">
    <input type="button" value="+" onclick="javascript:NBplus('nbCacahuete')">
</div>

<div>
    <p>High et fines herbes</p>
    <input type="button" value="-" onclick="javascript:NBHFHmoins()">
    <input type="button" value="+" onclick="javascript:NBplus('nbHFH')">
</div>

<div>
    <p>Salade tomate oignon</p>
    <input type="button" value="-" onclick="javascript:NBSTOmoins()">
    <input type="button" value="+" onclick="javascript:NBplus('nbSTO')">
</div>

<form action="panier.php" method="post">
    <input type="number" min="0" id="nbJambon" name="nbJambon">
    <input type="number" min="0" id="nbCacahuete" name="nbCacahuete">
    <input type="number" min="0" id="nbHFH" name="nbHFH">
    <input type="number" min="0" id="nbSTO" name="nbSTO">
    <input type="reset" value="Reset">
    <input type="submit" value="Panier">
</form>



<script type="text/javascript" src="script.js"></script>

</body>

</html>