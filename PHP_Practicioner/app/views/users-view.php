<?php require('partials/head.php'); ?>

    <h1>Users Page</h1>

    <h2>Name:</h2>

    <form method="POST" action="/users">

        <input name="name" id=""></input>
        <button type="submit">Submit</button>

    </form>

    <?php foreach($users as $user) :?>
        <ul>
            <li><?= $user->name; ?></li>
        </ul>
    <?php endforeach; ?>


<?php require('partials/footer.php'); ?>