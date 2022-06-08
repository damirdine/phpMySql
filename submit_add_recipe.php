<?php
    session_start();
    include_once 'variables.php';

    if(!isset($_SESSION['logged_user'])){
        
        echo('Veillez bien remplir le formulaire avant de la soumettre');
    }
    $logUser = $_SESSION['logged_user'];
    $title = $_POST['title'];
    $recipe = $_POST['recipe'];

    $sqlREquest = "INSERT INTO recettes (title,recipe,author,is_enabled) VALUES (:title, :recipe, :author, :is_enabled); ";
    $addRecipe = $db -> prepare($sqlREquest);
    $addRecipe->execute(
        [
            'title'=> $title,
            'recipe'=>$recipe,
            'author'=> $logUser,
            'is_enabled' => 1
        ]
    )or die(print_r($db->errorInfo()));
    include_once 'header.php';
?>
<h3 class="alert alert-success my-5">La recette de : <?php echo($title . " a bien était ajouté." )?> </h3>
<a class="btn btn-primary" href="./index.php">Retour a l'accueil</a>
<?php include_once 'footer.php';?>  