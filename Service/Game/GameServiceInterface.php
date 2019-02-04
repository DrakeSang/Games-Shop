<?php

namespace Service\Game;

use Data\Games\GameIndexViewData;
use Data\Games\Game;

interface GameServiceInterface 
{
    public function getNewestGames($consoleType): GameIndexViewData;

    public function getTopSoldGames($consoleType): GameIndexViewData;

    public function getGamesOnPromotion($consoleType): GameIndexViewData;

    public function getGamesByConsoleAndType($gameType, $consoleType, $this_page_first_result, $results_per_page): GameIndexViewData;

    public function getSingleGame($gameId): GameIndexViewData;

    public function getCommentsOfGame($gameId): Array;

    public function getGameById($gameId): Game;

    public function getSingleGameByNameDetails($gameName): GameIndexViewData;

    public function getSingleGameByName($gameId): Array;

    public function getCommentsOfGameByName($gameName): Array;
}