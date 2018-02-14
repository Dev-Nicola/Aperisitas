<?php

session_start();

if(isset($_SESSION['error_message'])) {
    $error = $_SESSION['error_message'];
    unset($_SESSION['error_message']);
}
if(isset($_SESSION['success_message'])) {
    $success = $_SESSION['success_message'];
    unset($_SESSION['success_message']);
}

// include header ici
?>

<?php if(isset($error)): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $error ?>
    </div>
<?php endif; ?>

<?php if(isset($success)): ?>
    <div class="alert alert-success" role="alert">
        <?php echo $success ?>
    </div>
<?php endif; ?>

    <form action="libraries/scriptBDD.php" method="post">

        <div class="form-group">
            <input type="text" name="firstname" class="form-control" placeholder="Entrez votre prénom">
        </div>

        <div class="form-group">
            <input type="text" name="lastname" class="form-control" placeholder="Entrez votre nom">
        </div>

        <div class="form-group">
            <input type="text" name="username" class="form-control" placeholder="Entrez votre nom d'utilisateur(e.g. Risitas22)">
        </div>

        <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Entrez votre email">
        </div>

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>

        <button type="submit" class="btn btn-primary">Comfirmer</button>
    </form>

<?php //include footer ici ?>