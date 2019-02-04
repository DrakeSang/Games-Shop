<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/cart.css">

<?php if($data['games_count'] == 0): ?>
    <div class="empty">
        <p>Your shooping cart is empty. 
        <br>
        Please return to games page to buy some games.</p>
        <a href="games.php">Go back</a>
    </div>
    <?php else: ?>
        <div class="games_container">
            <?php foreach($data['buyed_games'] as $game): ?>
                <div class="box">
                    <form action="cart.php?action=add&id=<?= $game->getId(); ?>"    method="post">
                        <img src="<?= $game->getGamePic(); ?>"/>
                        <h4 class="text-info"><?= $game->getGameName(); ?> </h4>
                        <h4><?= $game->getGamePrice(); ?> лв.</h4>
                        <input type="text" name="quantity" id="quantity" value="1" />
                        <input type="hidden" name="name" value="<?= $game->getGameName(); ?>" />
                        <input type="hidden" name="price" value="<?= $game->getGamePrice(); ?>" />
                        <input type="submit" name="add_to_cart" value="Add To Cart" /> 
                    </form>
                </div>
            <?php endforeach; ?>   
        </div>

        <table>
            <caption>Order Details</caption>
            <thead>
                <tr>  
                    <th>Game Name</th>  
                    <th>Quantity</th>  
                    <th>Price</th>  
                    <th>Total</th>  
                    <th>Action</th>  
                </tr>
            </thead>
            <?php if(!empty($_SESSION['shopping_cart'])): ?>
                <?php
                    $total = 0;
                ?>
                <?php foreach($_SESSION['shopping_cart'] as $key => $product): ?>
                    <tr>  
                        <td data-label="Game Name"><?= $product['name']; ?></td>  
                        <td data-label="Quantity"><?= $product['quantity']; ?></td>  
                        <td data-label="Price"><?= $product['price']; ?> лв.</td> 
                        <td data-label="Total"><?= number_format($product['quantity'] * $product['price'], 2); ?> лв.</td> 
                        <td data-label="Action">
                            <div class="btn-danger">
                                <a href="cart.php?action=delete&id=<?= $product['id']; ?>">Remove</a>
                            </div>
                        </td>  
                    </tr>  
                <?php 
                    $total = $total + ($product['quantity'] * $product['price']);  
                    endforeach;
                ?>

                <tr>
                    <td colspan="3" data-label="Total">Total</td>
                    <td data-label="Price"><?= number_format($total, 2); ?> лв.</td>
                    <td></td> 
                </tr>

                <tr>
                    <td colspan="5">
                        <?php 
                            if (isset($_SESSION['shopping_cart'])):
                            if (count($_SESSION['shopping_cart']) > 0):
                        ?>
                            <a href="checkout.php?totalSum=<?= $total; ?>" class="button">Checkout</a>
                        <?php endif; endif; ?>
                    </td>
                </tr>
            <?php endif; ?>                   
        </table>
<?php endif; ?>

<?php require('./partials/footer.php') ?>