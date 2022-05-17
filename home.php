<?php include_once('header.php'); ?>
    <div class="container">

        <h1>Site de Recettes !</h1>

        <!-- Plus facile à lire -->
        <?php foreach(get_recipes($recipes, $limit) as $recipe) : ?>
            <article>
                <h3><?php echo($recipe['title']); ?></h3>
                <div><?php echo($recipe['recipe']); ?></div>
                <i><?php echo(display_author($recipe['author'], $users)); ?></i>
            </article>
        <?php endforeach ?>
    </div>

    <?php include_once('footer.php'); ?>
