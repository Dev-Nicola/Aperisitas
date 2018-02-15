<?php
session_start();

if(isset($_SESSION['message_error'])) {
    $error = $_SESSION['message_error'];

    unset($_SESSION['message_error']);
}

?>

<?php if(isset($error)): ?>
    <div class="alert alert-warning" role="alert">
        <?php echo $error ?>
    </div>
<?php endif; ?>

    <form action="adress.php" method="post">

        <!-- <div class="form-group">
            <input type="text" name="streetnumber" class="form-control" placeholder="Entrez le numéro de votre rue.">
        </div>

        <div class="form-group">
            <input type="text" name="streetname" class="form-control" placeholder="Entrez le nom de votre rue.">
        </div>

        <div class="form-group">
            <input type="text" name="postalcode" class="form-control" placeholder="Entrez votre code postal.">
        </div>

        <div class="form-group">
            <input type="text" name="city" class="form-control" placeholder="Entrez votre ville.">
        </div>

        <div class="form-group">
            <input type="text" name="country" class="form-control" placeholder="Entrez votre pays.">
        </div> -->

        <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Entrez votre mot de passe">
        </div>

        <button type="submit" class="btn btn-primary">Compléter</button>
    </form>

<?php  ?>