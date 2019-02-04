<?php

namespace Service\Comment;

use Adapter\DatabaseInterface;
use Data\Comments\Comment;

class CommentService implements CommentServiceInterface
{
    /**
    * @var DatabaseInterface
    */
    private $db;

    public function __construct(DatabaseInterface $db)
    {
        $this->db = $db;
    }

    public function addComment($username, $email, $commentBody, $date, $gameId, $userId)
    {
        $query = "INSERT INTO comments (username, email, commentBody, date, gameId, userId) VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $this->db->prepare($query);
        $stmt->execute([
            $username,
            $email,
            $commentBody,
            $date,
            $gameId,
            $userId
        ]);
    }
} 