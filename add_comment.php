<?php 

use Service\User\UserService;
use Service\Comment\CommentService;

require_once 'app.php';

$userService = new UserService($db);
$commentService = new CommentService($db);

$data = array();

$data['comment'] = '';

$data['comment_error'] = '';

$data['success'] = '';

if(empty($_SESSION)){
    header("Location: login.php");
}else {
    $userId = $_SESSION['user_id'];

    $user = $userService -> getUserById($userId);
    $data['user'] = $user;

    if(isset($_POST['add_comment'])){
        $username = test_input($_POST['username']);
        $email = test_input($_POST['email']);
        $comment = test_input($_POST['comment']);

        if(empty($comment)){
            $data['comment_error'] = "Comment is required";
        }else {
            $gameId = $_GET['game_id'];
            $userId = $_SESSION['user_id'];
            $date = date('Y-m-d H:i:s');

            $commentService -> addComment($username, $email, $comment, $date, $gameId, $userId);

            $data['success'] = "Your comment have been successfully added!";

            header('Refresh:2; url=' . 'game.php?' . $_SERVER['QUERY_STRING']);
        }
    }

    $app->loadTemplate('comment_frontend', $data);
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}