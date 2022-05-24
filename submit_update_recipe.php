<?php
    session_start();
    include_once 'variables.php';

    if(!isset($_POST['title']) || !isset($_POST['recipe']) || !isset($_SESSION['logged_user'])){
        
        echo('<p class="alert alert-warning mt-5">Veillez bien remplir le formulaire avant de la soumettre</p>');
    }
    // echo('<pre>');
    // var_dump($_POST,$_SESSION['logged_user_name']);
    // echo('<pre>');
    $logUser = $_SESSION['logged_user'];
    $title = $_POST['title'];
    $recipe = $_POST['recipe'];
    $recipe_id = $_POST['recipe_id'];


    $sqlUpdateREquest = "UPDATE recipes SET title = :title, recipe = :recipe WHERE recipe_id = :id";
    $UpdateRecipe = $db -> prepare($sqlUpdateREquest);
    $UpdateRecipe->execute(
        [
            'title'=> $title,
            'recipe'=>$recipe,
            'id'=> $recipe_id,
        ]
    );
?>