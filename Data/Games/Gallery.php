<?php

namespace Data\Games;

class Gallery 
{
    private $id;

    private $gameName;
    
    private $gameGalleryFirstPic;

    private $gameGallerySecondPic;

    private $gameGalleryThirdPic;

    private $gameGalleryForthPic;

    private $gameGalleryFifthPic;

    private $gameGallerySixthPic;

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
     * Get the value of gameGalleryFirstPic
     */ 
    public function getGameGalleryFirstPic()
    {
        return $this->gameGalleryFirstPic;
    }

    /**
     * Set the value of gameGalleryFirstPic
     *
     * @return  self
     */ 
    public function setGameGalleryFirstPic($gameGalleryFirstPic)
    {
        $this->gameGalleryFirstPic = $gameGalleryFirstPic;

        return $this;
    }

    /**
     * Get the value of gameGallerySecondPic
     */ 
    public function getGameGallerySecondPic()
    {
        return $this->gameGallerySecondPic;
    }

    /**
     * Set the value of gameGallerySecondPic
     *
     * @return  self
     */ 
    public function setGameGallerySecondPic($gameGallerySecondPic)
    {
        $this->gameGallerySecondPic = $gameGallerySecondPic;

        return $this;
    }

    /**
     * Get the value of gameGalleryThirdPic
     */ 
    public function getGameGalleryThirdPic()
    {
        return $this->gameGalleryThirdPic;
    }

    /**
     * Set the value of gameGalleryThirdPic
     *
     * @return  self
     */ 
    public function setGameGalleryThirdPic($gameGalleryThirdPic)
    {
        $this->gameGalleryThirdPic = $gameGalleryThirdPic;

        return $this;
    }

    /**
     * Get the value of gameGalleryForthPic
     */ 
    public function getGameGalleryForthPic()
    {
        return $this->gameGalleryForthPic;
    }

    /**
     * Set the value of gameGalleryForthPic
     *
     * @return  self
     */ 
    public function setGameGalleryForthPic($gameGalleryForthPic)
    {
        $this->gameGalleryForthPic = $gameGalleryForthPic;

        return $this;
    }

    /**
     * Get the value of gameGalleryFifthPic
     */ 
    public function getGameGalleryFifthPic()
    {
        return $this->gameGalleryFifthPic;
    }

    /**
     * Set the value of gameGalleryFifthPic
     *
     * @return  self
     */ 
    public function setGameGalleryFifthPic($gameGalleryFifthPic)
    {
        $this->gameGalleryFifthPic = $gameGalleryFifthPic;

        return $this;
    }

    /**
     * Get the value of gameGallerySixthPic
     */ 
    public function getGameGallerySixthPic()
    {
        return $this->gameGallerySixthPic;
    }

    /**
     * Set the value of gameGallerySixthPic
     *
     * @return  self
     */ 
    public function setGameGallerySixthPic($gameGallerySixthPic)
    {
        $this->gameGallerySixthPic = $gameGallerySixthPic;

        return $this;
    }
}