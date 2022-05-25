<?php
    session_start();
    include_once 'variables.php';

    if(!isset($_POST['update_title']) || !isset($_POST['update_recipe']) || !isset($_SESSION['logged_user'])){  
        $errorMsg = '<p class="alert alert-warning mt-5">Veillez bien remplir le formulaire avant de la soumettre</p>';
        echo($errorMsg);
    }
     
    $logUser = $_SESSION['logged_user'];
    $updateTitle = $_POST['update_title'];
    $updateRecipe = $_POST['update_recipe'];
    $recipe_id = $_POST['recipe_id'];


    $sqlUpdateREquest = "UPDATE recettes SET title = :title, recipe = :recipe WHERE recpe_id = :id";
    $UpdateRecipe = $db -> prepare($sqlUpdateREquest);
    $UpdateRecipe->execute(
        [
            'title'=> $updateTitle,
            'recipe'=>$updateRecipe,
            'id'=> $recipe_id,
        ]
    );
    include_once 'header.php';
?>

<h3 class="alert alert-success my-5">Les modifications de la recette : <?php echo($updateTitle . " avec l'id : " . $recipe_id)?> </h3>
<a class="btn btn-primary" href="./index.php">Retour a l'accueil</a>