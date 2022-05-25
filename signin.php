<?php
session_start();
include_once 'variables.php';


?>

<?php include_once('header.php'); ?>

<?php if(isset($_SESSION['logged_user'])):?>   
    <p class="alert alert-success">Bonjour <?php echo(htmlspecialchars(($_SESSION['logged_user_name'])))?> et vous etes deja connecter !</p> 
<?php else:?>
    <form action='./submit_signin.php' method="POST">
        <h1>Inscription</h1>
        <div class="mb-3">
            <label for="email" class="form-label">Nom et prenom</label>
            <input type="text" class="form-control" id="email" name="fullname" aria-describedby="email-help" placeholder="John Doe" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Age</label>
            <input type="number" class="form-control" id="email" name="age" aria-describedby="email-help" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help" placeholder="john.d@exemple.com" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type='password' class="form-control mb-3" placeholder="Votre mot de passe" id="password" name="password" required>
            <input type='password' class="form-control" placeholder="confirmer mot de passe" id="password" name="confirm_password" required>
        </div>
        <button type="submit" class="btn btn-primary">S'inscrire</button>
    </form>
<?php endif; ?>