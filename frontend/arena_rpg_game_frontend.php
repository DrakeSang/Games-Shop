<?php require('./partials/header.php') ?>

<script src="./js/arena_rpg_game/gamemanager.js"></script>
<script src="./js/arena_rpg_game/enemy.js"></script>
<script src="./js/arena_rpg_game/player.js"></script>

<link rel="stylesheet" href="css/arena_rpg_game.css">

<div class="wrapper">
    <div class="top">
        <p>Play the greatest RPG ever made!</p>
        <h2>Choose your character!</h2>
    </div>

    <div class="interface">
        <a href="#" onclick="GameManager.setGameStart('Warrior')">
            <img src="pics/arena_rpg_game/avatar_players/warrior.jpg" alt="warrior">
            <div>
                <h3>Warrior</h3>
                <p>Warriors have higher health and stamina, however their strength also makes them slower and clumsier.</p>
            </div>
        </a>

        <a href="#" onclick="GameManager.setGameStart('Rogue')">
            <img src="pics/arena_rpg_game/avatar_players/rogue.jpg" alt="rogue">
            <div>
                <h3>Rogue</h3>
                <p>Rogues are fast and have hight stamina and speed, which amkes up for     their lack in strength and health.</p>
            </div>
        </a>

        <a href="#" onclick="GameManager.setGameStart('Mage')">
            <img src="pics/arena_rpg_game/avatar_players/mage.jpg" alt="mage">
            <div>
                <h3>Mage</h3>
                <p>Mages are glass cannons which puts all their effort in spells. This  means they stack on everything else.</p>
            </div>
        </a>

        <a href="#" onclick="GameManager.setGameStart('Hunter')">
            <img src="pics/arena_rpg_game/avatar_players/hunter.jpg" alt="hunter">
            <div>
                <h3>Hunter</h3>
                <p>Hunters are well rounden fighters that focus on evening out their    skills. No strength or weaknesses.</p>
            </div>
        </a>
    </div>

    <div class="actions"></div>

    <div class="arena"></div>

    <div class="enemy"></div>
</div>

<?php require('./partials/footer.php') ?>