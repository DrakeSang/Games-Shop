<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/cart_games.css">

<div class="wrapper">
    <div class="welcome">
        <p>Welcome <?= $data['user']->getFirstName(); ?> <?= $data['user']->getLastName(); ?>.
        <br>
        Here you can check your order history.</p>
    </div>

    <?php if($data['orders_count'] > 0): ?>
        <?php foreach($data['arr'] as $order): ?>
            <div class="welcome">
                <p>Order Number: <?= $order[0]['orderId']; ?> / Total Sum: <?= $order[0]['totalSum']; ?>
                </p>
            </div>

            <div class="games_container">
                <?php foreach($order as $order): ?>
                    <div class="box">
                        <a href="game.php?game_id=<?= $order['gameId']; ?>">
                            <img src="<?= $order['gamePic']; ?>">
                        </a> 
                        <div>
                            <h3>Game Name:</h3>
                            <p><?= $order['gameName']; ?></p>
                            <h3>Game Price:</h3>
                            <p><?= $order['gamePrice']; ?> лв.</p>
                            <h3>Quantity:</h3>
                            <p><?= $order['quantity']; ?></p>
                        </div>
                        <div>
                            <h3>Price:</h3>
                            <p><?= $order['price']; ?></p>
                            <h3>Date:</h3>
                            <p><?= $order['date'];?></p>
                        </div>
                    </div>
                <?php endforeach; ?>  
            </div>
        <?php endforeach; ?>  
    <?php else: ?>
        <div class="welcome">
            <p>Sorry,but your order history is empty. 
            <br>
            Make some orders to see them.
            <br>
            Go <a href="games.php">back</a> to our games page to buy some games.</p>
        </div>
    <?php endif; ?>
</div>

<?php require('./partials/footer.php') ?>