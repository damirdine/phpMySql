<?php
session_start();
include 'variables.php';
include_once 'header.php';

if (isset($_GET['recipe_id'])) {
    $sqlRecipeQuery = 'SELECT * FROM recettes WHERE recpe_id = :recpe_id';
    $recipeStatement = $db->prepare($sqlRecipeQuery);
    $recipeStatement->execute(
        ['recpe_id' => $_GET['recipe_id'],]
    ) or die(print_r($db->errorInfo()));
    $recipe = $recipeStatement->fetch();

    // Jointure pour avoir le nom de l'utilisateur

    $sqlCommentsQuery = 'SELECT u.fullname, c.comment, c.created_at FROM users u INNER JOIN comments c ON c.recipe = :recipe and u.id = c.user_id ORDER BY c.created_at DESC';
    $commentsStatement = $db->prepare($sqlCommentsQuery);
    $commentsStatement->execute(
        ['recipe' => $_GET['recipe_id'],]
    ) or die(print_r($db->errorInfo()));
    $comments = $commentsStatement->fetchAll();
};
if (isset($_POST['comment']) && isset($_POST['recipe_id']) && isset($_POST['user'])) {

    $addCommentSqlREquest = "INSERT INTO comments (comment,recipe,user_id,created_at) VALUES (:comment, :recipe, :user_id, :created_at); ";
    $addComment = $db->prepare($addCommentSqlREquest);
    $addComment->execute(
        [
            'comment' => $_POST['comment'],
            'recipe' => $_POST['recipe_id'],
            'user_id' => $_POST['user'],
            'created_at' => date('Y-m-d\TH:i:s'),
        ]
    ) or die(print_r($db->errorInfo()));

    header("Refresh:0");
};
if(isset($_POST["user_id"]) && isset($_POST["comment_content"])){
    $delCommentSqlREquest = "DELETE FROM comments WHERE user_id= :user_id AND comment= :comment";
    $delComment = $db->prepare($delCommentSqlREquest);
    $delComment->execute(
        [
            'comment' => $_POST['comment_content'],
            'user_id' => $_POST['user_id'],
        ]
    ) or die(print_r($db->errorInfo()));

    header("Refresh:0");
}
?>
<?php if (isset($recipe)) : ?>
    <?php if (isset($_SESSION['logged_user'])) : ?>
        <h1 class="my-5"><?php echo ($recipe['title']) ?></h1>
        <p><?php echo ($recipe['recipe']) ?></p>
        <hr>
        <form class="mt-4" action="./post.php?recipe_id=<?php echo ($recipe['recpe_id']) ?>" method="POST">
            <div class="mb-3">
                <label for="formGroupExampleInput" class="form-label">Commentaire</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" name='comment' placeholder="D??tailler votre recette" rows="2" required></textarea>
            </div>
            <input type="hidden" name="user" value="<?php echo ($_SESSION['logged_user_id']); ?>">
            <input type="hidden" name="recipe_id" value="<?php echo ($recipe['recpe_id']); ?>">
            <button type="submit" class="btn btn-warning mb-3">Commenter</button>
            </div>
        </form>
        <div class="comments-container">
        
            <?php foreach ($comments as $comment) : ?>
                <article class="container-flud my-4">
                    <div class="article__header d-flex justify-content-between">
                        <h4><?php echo ($comment['fullname']); ?></h4>
                        <?php if ($comment['fullname']===$_SESSION['logged_user_name']) : ?>
                        <form class="btn-group" action="./post.php?recipe_id=<?php echo ($recipe['recpe_id']) ?>" method="POST">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            </button>
                            <input type="hidden" name="user_id" value="<?php echo ($_SESSION['logged_user_id']); ?>">
                            <input type="hidden" name="comment_content" value="<?php echo ($comment['comment']); ?>">
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><button class="dropdown-item text-white bg-danger" type="submit">Supprimer</button></li>
                            </ul>
                        </form>
                        <?php endif; ?>
                    </div>
                    <p><?php echo ($comment['comment']); ?></p>
                    <p><?php echo ($comment['created_at']); ?></p>
                </article>
                <hr>
            <?php endforeach; ?>

        </div>
    <?php else : ?>
        <p class="alert alert-warning mt-5">Erreur</p>
<?php endif;
endif;
include_once 'footer.php';
?>