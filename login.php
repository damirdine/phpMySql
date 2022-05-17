<?php include_once('header.php')?>

<form class='container' action="submit_contact.php" method="POST">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" id="email" name="email" aria-describedby="email-help">
        <div id="email-help" class="form-text">Nous ne revendrons pas votre email.</div>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <textarea class="form-control" placeholder="Votre mot de passe" id="password" name="password"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Me connecter</button>
</form>

<?php include_once('footer.php') ?>