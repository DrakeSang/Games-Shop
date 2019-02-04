<?php 

use Service\Game\GameService;

require_once $_SERVER['DOCUMENT_ROOT'] . '/GamesShop/app.php';

$gameService = new GameService($db);

$choosedConsoleType = $_POST['consoleChoice'];

$data = $gameService->getGamesOnPromotion($choosedConsoleType);

?>

<?php sleep(2) ?>

<div class="main">
    <?php foreach ($data->getGamesOnPromotion() as $game): ?>
        <div class="box">
            <a href="game.php?id=<?= $game->getId(); ?>">   
                <img src="<?= $game->getGamePic(); ?>">
            </a>
            
            <p>
                <?= $game->getGameName(); ?> 
                <br>
                <?= $game->{'consoleName'}; ?>
            </p>
            <p><?= $game->getGamePrice(); ?> лв.</p>
            </div>
        <?php endforeach; ?>     
    </div>   
</div> 