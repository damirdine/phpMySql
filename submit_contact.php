<?php

$postData = $_POST;

if (!isset($postData['email']) || !isset($postData['message']))
{
	echo('Il faut un email et un message pour soumettre le formulaire.');
    return;
}	

$email = $postData['email'];
$message = $postData['message'];

include_once 'header.php';
?>


<h1>Message bien reçu !</h1>

<div class="card">
    
    <div class="card-body">
        <h5 class="card-title">Rappel de vos informations</h5>
        <p class="card-text"><b>Email</b> : <?php echo($email); ?></p>
        <p class="card-text"><b>Message</b> : <?php echo strip_tags($message); ?></p>
    </div>
</div>
<?php include_once 'footer.php';?>