let GameManager = {
    setGameStart: function(classType) {
        this.resetPlayer(classType);
        this.setPreFight();
    },
    resetPlayer: function(classType) {
        switch(classType){
            case "Warrior":
                player = new Player(classType, 200, 0, 200, 100, 50);
            break;
            case "Rogue":
                player = new Player(classType, 100, 0, 100, 150, 200);
            break;
            case "Mage":
                player = new Player(classType, 80, 0, 50, 200, 50);
            break;
            case "Hunter":
                player = new Player(classType, 200, 0, 50, 200, 100);
            break;
        }

        let getInterface = document.querySelector(".interface");

        getInterface.innerHTML = '<img  src="pics/arena_rpg_game/avatar_players/'+ classType.toLowerCase() + '.jpg" class="img_avatar"><div><h3>' + classType + '</h3><p class="health_player">Health: ' + player.health + '</p><p>Mana: ' + player.mana + '</p><p>Strength: ' + player.strength + '</p><p>Agility: ' + player.agility +'</p><p>Speed: ' + player.speed +'</p></div>';
    },
    setPreFight: function() {
        let getHeader = document.querySelector(".top");
        let getActions = document.querySelector(".actions");
        let getArena = document.querySelector(".arena");

        getHeader.innerHTML = '<p>Task: Find an enemy!</p>';
        getActions.innerHTML = '<a href="#" class="btn_prefight" onclick="GameManager.setFight()">Search for enemy!</a>';
        getArena.style.display = "block";
    },
    setFight: function() {
        let getHeader = document.querySelector(".top");
        let getActions = document.querySelector(".actions");
        let getEnemy = document.querySelector(".enemy");

        let enemy00 = new Enemy("Goblin", 100, 0, 50, 100, 100);
        let enemy01 = new Enemy("Troll", 200, 0, 150, 80, 150);
        let chooseRandomEnemy = Math.floor(Math.random() * Math.floor(2));

        switch(chooseRandomEnemy){
            case 0:
                enemy = enemy00;
                console.log()
            break;
            case 1:
                enemy = enemy01;
            break;
        }

        getHeader.innerHTML = '<p>Task: Choose your move!</p>';
        getActions.innerHTML = '<a href="#" class="btn_prefight" onclick="PlayerMoves.calcAttack()">Attack!</a>';
        console.log(enemy);
        getEnemy.innerHTML = '<img  src="pics/arena_rpg_game/avatar_enemies/'+ enemy.classType.toLowerCase() + '.jpg" class="img_avatar"><div><h3>' + enemy.classType + '</h3><p class="enemy_player">Health: ' + enemy.health + '</p><p>Mana: ' + enemy.mana + '</p><p>Strength: ' + enemy.strength + '</p><p>Agility: ' + enemy.agility +'</p><p>Speed: ' + enemy.speed +'</p></div>';

    }
}