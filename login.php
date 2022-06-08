<?php
session_start();
include_once 'variables.php';

$postMail = $_POST['email'];
$postPassword = $_POST['password'];


if (isset($postMail)  && isset($postPassword)) {
    
    foreach ($users as $user) {
        if (($user['email'] === $postMail) && ($user['password'] === $postPassword)) {
            
            $_SESSION['logged_user'] = $user['email'];
            $_SESSION['logged_user_name'] = $user['fullname'];
            $_SESSION['logged_user_id'] = $user['id'];
            setcookie(
                'logger_user',
                $_SESSION['logged_user'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            setcookie(
                'logged_user_name',
                $_SESSION['logged_user_name'],
                [
                    'expires' => time() + 365*24*3600,
                    'secure' => true,
                    'httponly' => true,
                ]
            );
            header("Refresh:0");
        } else {
            $errorMessage = htmlspecialchars(sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password'])) ;
        }
    }
}

?>

<?php include_once('header.php'); ?>

<?php if(isset($_SESSION['logged_user'])):?>   

    <p class="alert alert-success">Bonjour <?php echo(htmlspecialchars(($_COOKIE['logged_user_name'])))?> et bienvenue sur le site !</p>
<?php elseif(isset($errorMessage)):?>

    <p class="alert alert-danger"> <?php echo($errorMessage)?></p>
    <form action='./index.php' method="POST">
    <h1>Connexion</h1>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" required>
        <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type='password' class="form-control" placeholder="Votre mot de passe" id="password" name="password" required>
    </div>
    <button type="submit" class="btn btn-primary">Me connecter</button>
</form>
<a class="mt-4" href="./signin.php">S'inscrire</a>
    
<?php else: ?>
    <form action='./index.php' method="POST">
        <h1>Connexion</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" required>
            <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type='password' class="form-control" placeholder="Votre mot de passe" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary">Me connecter</button>
    </form>
    <p><br> OU</p>
    <a class="mt-4" href="./signin.php">S'inscrire</a>
<?php endif; ?>