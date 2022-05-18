<?php include 'variables.php' ?>
<?php
$postMail = $_POST['email'];
$postPassword = $_POST['password'];

if (isset($postMail)  && isset($postPassword)) {
    foreach ($users as $user) {
        if ($user['email'] === $postMail && $user['password'] = $postPassword) {
            $loggedUser = ['email' => $user['email']];
            return;
        } else {
            $errorMessage = sprintf('Les informations envoyées ne permettent pas de vous identifier : (%s/%s)', $_POST['email'], $_POST['password']);
        }
    }
}
?>

<?php if (isset($loggedUser)) : ?>
    <!-- code if User logged -->
    <p>Bonjour <?php echo $loggedUser['email']; ?> et bienvenue sur le site !</p>
<?php else : ?>
    <!-- //is user note logged -->
    <p><?php echo ($errorMessage) ?></p>
<?php endif ?>