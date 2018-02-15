<?php
session_start();

if($_SESSION['message_error'] == true){
    echo $_SESSION['message_error'];
};

?>

    <form action="adress.php" method="post">

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>

        <button type="submit" class="btn btn-primary">Se connecter</button>
    </form>

<?php  ?>