<?php 

use Service\Game\GameService;

require_once 'app.php';

$gameService = new GameService($db);

$data = array();

if(isset($_POST['search'])) {
    $gameName = $_POST['gameName'];
}

if(count($gameService->getSingleGameByName($gameName)) > 0){
    $data['game_count'] = count($gameService->getSingleGameByName($gameName));

    $data['game_details'] = $gameService->getSingleGameByNameDetails($gameName);

    $commentsCount = count($gameService->getCommentsOfGameByName($gameName));

    $data['comments_count'] = $commentsCount;
}else {
    $data['game_count'] = 0;
}

$app->loadTemplate('single_game_by_name_frontend', $data);
