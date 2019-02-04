<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/main.css">

<div class="container">
    <div class="wrapper">
        <div class="title">
            <h2>Log In</h2>
        </div>

        <form action="login.php" method="post" class="register">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $data['username'] ?>">
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" value="<?= $data['password'] ?>">
            </div>
            <div class="input-group">
                <button type="submit" name="login" class="btn">Login</button>
            </div>
            <span class="error"><?= $data['error'] ?></span>
            <div class="success"><?= $data['success'] ?></div>
            <p class="choice">
                Not yet a member? <a href="register.php">Sign up</a>
            </p>
        </form>
    </div>
</div>

<?php require('./partials/footer.php') ?>