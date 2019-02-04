<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/main.css">

<div class="container">
    <div class="wrapper">
        <div class="title">
            <h2>Checkout</h2>
        </div>

        <form action="" method="post"  class="checkout">
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
                <label for="address">Your Address</label>
                <input type="text" name="address" id="address" value="<?= $data   ['address'] ?>" placeholder="Your Address">
                <span class="error"><?= $data['address_error'] ?></span>
            </div>
            <div class="input-group">
                <label for="phone">Your Phone</label>
                <input type="text" name="phone" id="phone" value="<?= $data   ['phone'] ?>" placeholder="Your Phone">
                <span class="error"><?= $data['phone_error'] ?></span>
            </div>
            <div class="input-group">
                <button type="submit" name="checkout" class="btn">Checkout</button>
            </div>
            <div class="success"><?= $data['success'] ?></div>
    </div>
</div>

<?php require('./partials/footer.php') ?>