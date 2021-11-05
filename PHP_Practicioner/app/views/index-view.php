<?php require('partials/head.php'); ?>

    <h1>Home Page</h1>

<!--
    <ul>
    <?php foreach($task as $tarefa) : ?>
        <li>
            <?php if($tarefa->completed) : ?>
                <strike>
                    <?= $tarefa->description; ?>
                </strike>
            <?php else : ?>
                <?= $tarefa->description; ?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
    </ul>
-->

<?php require('partials/footer.php'); ?>