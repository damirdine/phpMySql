<?php
    include_once 'variables.php';
    include_once('header.php');
?>

<?php
$postMail = $_POST['email'];
$postPassword = $_POST['password'];

if (isset($postMail)  && isset($postPassword)) {
    foreach ($users as $user) {
        if (($user['email'] === $postMail) && ($user['password'] === $postPassword)) {
            $loggedUser = ['email' => $user['email']];
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
        }
    }
}
?>
<main class="container">

    <?php if (isset($loggedUser)) : ?>
        <!-- code if User logged -->
        <p class="alert alert-success mt-5">Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !</p>
        <?php include_once('home.php')?>
    <?php else : ?>
        <!-- //is user note logged -->
        <p class="alert alert-warning"><?php echo ($errorMessage) ?></p>
        <?php include_once 'login.php' ?>
    <?php endif ?>



<?php include_once('footer.php') ?>