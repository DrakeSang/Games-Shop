<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/cart_games.css">

<div class="wrapper">
    <div class="welcome">
        <p>Welcome <?= $data['user']->getFirstName(); ?> <?= $data['user']->getLastName(); ?>.</p>
        <p>Here you can check your favourite games.</p>
    </div>

    <?php if($data['favourite_games_count'] > 0): ?>
        <div class="games_container">
            <?php foreach($data['favourite_games'] as $game): ?>
                <div class="box">
                    <a href="game.php?game_id=<?= $game['id']; ?>">
                        <img src="<?= $game['gamePic'];?>">
                    </a>
                
                    <div>
                        <h3>Game Name:</h3>
                        <p><?= $game['gameName'];?></p>
                        <h3>Game Price:</h3>
                        <p><?= $game['gamePrice'];?> лв.</p>
                    </div>
                    <div>
                        <h3>Game Date:</h3>
                        <p><?= $game['gameDate'];?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>  
    <?php else: ?>
        <div class="welcome">
            <p>Sorry,but your fovourites games are empty. 
            <br>
            Add some favourite products to see them.
            <br>
            Go <a href="games.php">back</a> to our games page.
            </p>
        </div>
    <?php endif; ?> 
</div>



<?php require('./partials/footer.php') ?>