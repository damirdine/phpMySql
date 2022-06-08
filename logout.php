<?php
    session_start();
    session_destroy();
    include_once('variables.php');
    include_once('header.php');
?>
<p class="alert alert-warning">Vous avez  été déconnecter</p>
<a class="btn btn-primary" href="./index.php">Retour a l'accueil</a>

<?php include_once('footer.php'); ?>