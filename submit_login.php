<?php
    $postMail = $_POST['email'];
    $postPassword = $_POST['password'];

    if(isset($postMail)  && isset($postPassword)){
        echo( ' Bonjour ' . $_POST['email'] .  'et bienvenue sur le site !');
    }else{
        echo('error');
    }
?>