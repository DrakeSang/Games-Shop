<?php

namespace Data\Games;

use Data\Games\Game;
use Data\Games\Gallery;
use Data\Comments\Comment;

class GameIndexViewData
{
    /**
    * @var Game[]|\Generator
    */
    private $lastAddedGames;

    /**
    * @var Game[]|\Generator
    */
    private $topSoldGames;

    /**
    * @var Game[]|\Generator
    */
    private $gamesOnPromotion;

    /**
    * @var Game[]|\Generator;
    */
    private $gamesByConsoleAndType;

    /**
    * @var Game[]\Generator;
    */
    private $singleGame;

    /**
    * @var Gallery[]\Generator;
    */
    private $galleryPics;

    /**
    * @var Comment[]\Generator;
    */
    private $allComments;

    /**
    * @return Game[]|\Generator
    */
    public function getLastAddedGames()
    {
        return $this->lastAddedGames;
    }

    /**
    * @param callable $lastAddedGames
    */
    public function setLastAddedGames(callable $lastAddedGames)
    {
        $this->lastAddedGames = $lastAddedGames();
    }

    /**
    * @return Game[]|\Generator
    */
    public function getTopSoldGames()
    {
        return $this->topSoldGames;
    }

    /**
    * @param callable $topSoldGames
    */
    public function setTopSoldGames(callable $topSoldGames)
    {
        $this->topSoldGames = $topSoldGames();
    }

    /**
    * @return Game[]|\Generator
    */
    public function getGamesOnPromotion()
    {
        return $this->gamesOnPromotion;
    }

    /**
    * @param callable $gamesOnPromotion
    */
    public function setGamesOnPromotion(callable $gamesOnPromotion)
    {
        $this->gamesOnPromotion = $gamesOnPromotion();
    }

    /**
    * @return Game[]|\Generator
    */
    public function getGamesByConsoleAndType()
    {
        return $this->gamesByConsoleAndType;
    }

    /**
    * @param callable $gamesByConsoleAndType
    */
    public function setGamesByConsoleAndType(callable $gamesByConsoleAndType)
    {
        $this->gamesByConsoleAndType = $gamesByConsoleAndType();
    }

    /**
    * @return Game[]|\Generator
    */
    public function getSingleGame()
    {
        return $this->singleGame;
    }

    /**
    * @param callable $singleGame
    */
    public function setSingleGame(callable $singleGame)
    {
        $this->singleGame = $singleGame();
    }

    /**
    * @return Gallery[]|\Generator
    */
    public function getGalleryPics()
    {
        return $this->galleryPics;
    }

    /**
    * @param callable $galleryPics
    */
    public function setGalleryPics(callable $galleryPics)
    {
        $this->galleryPics = $galleryPics();
    }

    /**
    * @return Comment[]|\Generator
    */
    public function getAllComments()
    {
        return $this->allComments;
    }

    /**
    * @param callable $allComments
    */
    public function setAllComments(callable $allComments)
    {
        $this->allComments = $allComments();
    }
}