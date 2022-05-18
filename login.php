<?php
    session_start();
    include_once 'variables.php';
    include_once('header.php');
?>

<?php
$postMail = $_POST['email'];
$postPassword = $_POST['password'];

if (isset($postMail)  && isset($postPassword)) {
    foreach ($users as $user) {
        if (($user['email'] === $postMail) && ($user['password'] === $postPassword)) {
            $_SESSION['logged_user'] = $user['email'];
            $_SESSION['logged_user_name'] = $user['full_name'];

        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
        }
    }
}
?>
<?php if(isset($_SESSION['logged_user'])):?>   
    <p class="alert alert-success">Bonjour <?php echo($_SESSION['logged_user_name'])?> et bienvenue sur le site !</p>
<?php elseif($errorMessage):?>
    <p class="alert alert-danger"> <?php echo($errorMessage)?></p>
<?php endif; ?>
    
<form class='container' action='./home.php' method="POST">
    <h1>Connexion</h1>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
        <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type='password' class="form-control" placeholder="Votre mot de passe" id="password" name="password"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Me connecter</button>
</form>