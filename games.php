<?php 

use Service\Game\GameService;

require_once 'app.php';

$gameService = new GameService($db);

// connect to database
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'games_shop');

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

$consoleType = 'ALL';
$gameType = 'ALL';

if(!empty($_GET)){
    $consoleType = $_GET['consoleType'];
    $gameType = $_GET['gameType'];
}

$data = $gameService->getGamesByConsoleAndType($gameType, $consoleType, $this_page_first_result, $results_per_page);

$app->loadTemplate('games_frontend', $data);