<?php 

use Service\Game\GameService;

require_once 'app.php';

$gameService = new GameService($db);

$gameId = $_GET['game_id'];

$data = $gameService->getSingleGame($gameId);

$commentsCount = count($gameService->getCommentsOfGame($gameId));

$data->comments_count = $commentsCount;

$app->loadTemplate('singleGame_frontend', $data);