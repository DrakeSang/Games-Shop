<?php

namespace Data\Comments;

class Comment 
{
    private $id;

    private $username;

    private $email;

    private $commentBody;

    private $date;

    private $gameId;

    private $userId;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of username
     */ 
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set the value of username
     *
     * @return  self
     */ 
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of commentBody
     */ 
    public function getCommentBody()
    {
        return $this->commentBody;
    }

    /**
     * Set the value of commentBody
     *
     * @return  self
     */ 
    public function setCommentBody($commentBody)
    {
        $this->commentBody = $commentBody;

        return $this;
    }

        /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of gameId
     */ 
    public function getGameId()
    {
        return $this->gameId;
    }

    /**
     * Set the value of gameId
     *
     * @return  self
     */ 
    public function setGameId($gameId)
    {
        $this->gameId = $gameId;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
}