<?php 

use Service\User\UserService;

require_once 'app.php';

$userService = new UserService($db);

header("Content-Type: application/json");

$arr = array();

if(empty($_SESSION)){
    $arr["message"] = "notLoggedIn";
}else if(!empty($_SESSION['user_id'])){
    $userId = $_SESSION['user_id'];
    $gameId = $_GET['game_id'];

    $isGameAlreadyAdded = $userService->checkIfGameWasAlreadyAdded($userId, $gameId);

    $fetchedRows = count($isGameAlreadyAdded);

    if($fetchedRows > 0){
        $arr["message"] = "alreadyAdded";
    }else {
        $userService->addFavouriteGame($userId, $gameId);
        $arr["message"] = "addIt";
    }
}

echo json_encode($arr);