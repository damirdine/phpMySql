<?php
    session_start();
    session_destroy();
    include_once('variables.php');
    include_once('header.php');
?>
<p class="alert alert-success">Vous ete deconnecter</p>
<a class="btn btn-primary" href="./home.php"> retouerner a l'acceuil</a>

<?php include_once('footer.php'); ?>