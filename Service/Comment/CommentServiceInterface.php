<?php

namespace Service\Comment;

use Data\Comments\Comment;

interface CommentServiceInterface 
{
    public function addComment($username, $email, $commentBody, $date, $gameId, $userId);
}