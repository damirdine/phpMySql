<?php include_once('login.php') ?>
<?php
    include_once('header.php');
?>
    <main class="container">
        
        <h1>Site de Recettes !</h1>
        <?php foreach(get_recipes($recipes, $limit) as $recipe) : ?>
            <article>
                <h3><?php echo($recipe['title']); ?></h3>
                <div><?php echo($recipe['recipe']); ?></div>
                <i><?php echo(display_author($recipe['author'], $users)); ?></i>
            </article>
        <?php endforeach ?>
        
    <?php include_once('footer.php'); ?>
