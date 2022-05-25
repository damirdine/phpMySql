<?php
    session_start();
    include_once 'variables.php';
    if(!isset($_POST['recipe_id'])){
        echo("Aucune recette n'est assoucie a cette id");
    }
     
    $logUser = $_SESSION['logged_user'];
    $recipe_id = $_POST['recipe_id'];


    $sqlUpdateREquest = "DELETE FROM recettes WHERE recpe_id = :id";
    $UpdateRecipe = $db -> prepare($sqlUpdateREquest);
    $UpdateRecipe->execute(
        [
            'id'=> $recipe_id,
        ]
    );
    include_once 'header.php';
?>

<h3 class="alert alert-success my-5">La recette <?php echo($updateTitle . " avec l'id : " . $recipe_id . "a bien etait supprime")?> </h3>
<a class="btn btn-primary" href="./index.php">Retour a l'accueil</a>