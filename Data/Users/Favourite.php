<?php

namespace Data\Users;

class Favourite
{
    private $id;

    private $userId;

    private $gameId;

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
}