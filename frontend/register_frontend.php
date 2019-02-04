<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/main.css">

<div class="container">
    <div class='wrapper'>
        <div class="title">
            <h2>Register</h2>
        </div>

        <form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post"  class="register"  enctype="multipart/form-data">
            <div class="input-group">
                <label for="firstName">FirstName</label>
                <input type="text" name="firstName" id="firstName" value="<?= $data ['firstName'] ?>" placeholder="Your First Name">
                <span class="error"><?= $data['firstName_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" id="lastName" value="<?= $data   ['lastName'] ?>" placeholder="Your Last Name">
                <span class="error"><?= $data['lastName_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?= $data   ['username'] ?>" placeholder="Your Username">
                <span class="error"><?= $data['username_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" value="<?= $data['email'] ?>" placeholder="Your Email">
                <span class="error"><?= $data['email_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="avatar">Avatar</label>
                <input type="file" name="avatar" id="avatar">
                <label><?= $data['avatar'] ?></label>
                <span class="error"><?= $data['avatar_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="password_1">Password</label>
                <input type="password" name="password_1" id="password_1" value="<?= $data['password_1'] ?>" placeholder="Your Password">
                <span class="error"><?= $data['password_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="password_2">Confirm Password</label>
                <input type="password" name="password_2" id="password_2" value="<?= $data['password_2'] ?>" placeholder="Confirmed Password">
            </div>
            <div class="input-group">
                <button type="submit" name="register" class="btn">Register</button>
            </div>
            <div class="success"><?= $data['success'] ?></div>
            <?php if(empty($_SESSION['user_id'])): ?>
                <p class="choice">
                    Already a member? <a href="login.php">Log In</a>
                </p>
            <?php endif; ?>
        </form>
    </div>
</div>

<?php require('./partials/footer.php') ?>