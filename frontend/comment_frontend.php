<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/main.css">

<div class="container">
    <div class="wrapper">
        <div class="title">
            Add your comment
        </div>

        <form action="" method="post" class="comment">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" value="<?= $data['user']->getUsername() ?>" readonly>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?= $data['user']->getEmail() ?>" readonly>
            </div>
            <div class="input-group">
                <label for="comment">Comment</label>
                <textarea id="comment" name="comment" rows=10 value="<?= $data['comment'] ?>"></textarea>
                <span class="error"><?= $data['comment_error'] ?></span>
            </div>
            <div class="input-group">
                <button type="submit" name="add_comment" class="btn">Add your comment</button>
            </div>
            <div class="success"><?= $data['success'] ?></div>
        </form>
    </div>
</div>

<?php require('./partials/footer.php') ?>