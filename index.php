<?php 

use Service\Game\GameService;

require_once 'app.php';

$gameService = new GameService($db);

$defaultConsoleType = 'ALL';

$data = $gameService->getNewestGames($defaultConsoleType);

$app->loadTemplate('index_frontend', $data);