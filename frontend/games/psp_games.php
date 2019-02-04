<?php 

use Service\Game\GameService;

require_once $_SERVER['DOCUMENT_ROOT'] . '/GamesShop/app.php';

$gameService = new GameService($db);

$gameType = $_POST['gameType'];
$consoleType = $_POST['consoleType'];

// define how many results you want per page
$results_per_page = 5;

// determine which page number visitor is currenly on
if(isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page = 1;
}

// determine the sql LIMIT starting number for the results on the displaying page 
$this_page_first_result = ($page - 1) * $results_per_page;

$data = $gameService->getGamesByConsoleAndType($gameType, $consoleType, $this_page_first_result, $results_per_page);

?>

<?php sleep(2) ?>

<div class="main">
    <?php foreach ($data->getGamesByConsoleAndType() as $game): ?> 
        <div class="box">
            <a href="game.php?game_id=<?= $game->getId(); ?>">
                <img src="<?= $game->getGamePic();?>">
            </a>

            <a class="addToFavourites" href="addToFavourites.php?game_id=<?= $game->getId(); ?>">
                <span class="fa fa-star"></span>
            </a>
            
            <p>
                <?= $game->getGameName(); ?> 
                <br>
                <?= $game->{'consoleName'}; ?>
                <br>
                <?= $game->getGamePrice(); ?> лв.
            </p>
        </div>
    <?php endforeach; ?> 
</div>

<div class="pagination">
    <?php include('../pagination/pagination_links.php') ?>
</div> 