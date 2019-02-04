<?php

namespace Data\Games;

class Game
{
    private $id;

    private $gamePic;

    private $gameName;

    private $gameConsole;

    private $gamePrice;  

    private $gameDate;

    private $gameDescriptionHeader;

    private $gameDescriptionBody;

    private $gameNeededCPU;

    private $gameNeededRAM;

    private $gameNeededOS;

    private $gameNeededVideoCard;

    private $gameNeededFreeSpace;

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
     * Get the value of gamePic
     */ 
    public function getGamePic()
    {
        return $this->gamePic;
    }

    /**
     * Set the value of gamePic
     *
     * @return  self
     */ 
    public function setGamePic($gamePic)
    {
        $this->gamePic = $gamePic;

        return $this;
    }

    /**
     * Get the value of gameName
     */ 
    public function getGameName()
    {
        return $this->gameName;
    }

    /**
     * Set the value of gameName
     *
     * @return  self
     */ 
    public function setGameName($gameName)
    {
        $this->gameName = $gameName;

        return $this;
    }

    /**
     * Get the value of gameConsole
     */ 
    public function getGameConsole()
    {
        return $this->gameConsole;
    }

    /**
     * Set the value of gameConsole
     *
     * @return  self
     */ 
    public function setGameConsole($gameConsole)
    {
        $this->gameConsole = $gameConsole;

        return $this;
    }

    /**
     * Get the value of gamePrice
     */ 
    public function getGamePrice()
    {
        return $this->gamePrice;
    }

    /**
     * Set the value of gamePrice
     *
     * @return  self
     */ 
    public function setGamePrice($gamePrice)
    {
        $this->gamePrice = $gamePrice;

        return $this;
    }

    /**
    * Get the value of gameDate
    */ 
    public function getGameDate()
    {
        return $this->gameDate;
    }

    /**
     * Set the value of gameDate
     *
     * @return  self
     */ 
    public function setGameDate($gameDate)
    {
        $this->gameDate = $gameDate;

        return $this;
    }

    /**
     * Get the value of gameDescriptionHeader
     */ 
    public function getGameDescriptionHeader()
    {
        return $this->gameDescriptionHeader;
    }

    /**
     * Set the value of gameDescriptionHeader
     *
     * @return  self
     */ 
    public function setGameDescriptionHeader($gameDescriptionHeader)
    {
        $this->gameDescriptionHeader = $gameDescriptionHeader;

        return $this;
    }

    /**
     * Get the value of gameDescriptionBody
     */ 
    public function getGameDescriptionBody()
    {
        return $this->gameDescriptionBody;
    }

    /**
     * Set the value of gameDescriptionBody
     *
     * @return  self
     */ 
    public function setGameDescriptionBody($gameDescriptionBody)
    {
        $this->gameDescriptionBody = $gameDescriptionBody;

        return $this;
    }

    /**
     * Get the value of gameNeededCPU
     */ 
    public function getGameNeededCPU()
    {
        return $this->gameNeededCPU;
    }

    /**
     * Set the value of gameNeededCPU
     *
     * @return  self
     */ 
    public function setGameNeededCPU($gameNeededCPU)
    {
        $this->gameNeededCPU = $gameNeededCPU;

        return $this;
    }

    /**
     * Get the value of gameNeededRAM
     */ 
    public function getGameNeededRAM()
    {
        return $this->gameNeededRAM;
    }

    /**
     * Set the value of gameNeededRAM
     *
     * @return  self
     */ 
    public function setGameNeededRAM($gameNeededRAM)
    {
        $this->gameNeededRAM = $gameNeededRAM;

        return $this;
    }

    /**
     * Get the value of gameNeededOS
     */ 
    public function getGameNeededOS()
    {
        return $this->gameNeededOS;
    }

    /**
     * Set the value of gameNeededOS
     *
     * @return  self
     */ 
    public function setGameNeededOS($gameNeededOS)
    {
        $this->gameNeededOS = $gameNeededOS;

        return $this;
    }

    /**
     * Get the value of gameNeededVideoCard
     */ 
    public function getGameNeededVideoCard()
    {
        return $this->gameNeededVideoCard;
    }

    /**
     * Set the value of gameNeededVideoCard
     *
     * @return  self
     */ 
    public function setGameNeededVideoCard($gameNeededVideoCard)
    {
        $this->gameNeededVideoCard = $gameNeededVideoCard;

        return $this;
    }

    /**
     * Get the value of gameNeededFreeSpace
     */ 
    public function getGameNeededFreeSpace()
    {
        return $this->gameNeededFreeSpace;
    }

    /**
     * Set the value of gameNeededFreeSpace
     *
     * @return  self
     */ 
    public function setGameNeededFreeSpace($gameNeededFreeSpace)
    {
        $this->gameNeededFreeSpace = $gameNeededFreeSpace;

        return $this;
    }
}