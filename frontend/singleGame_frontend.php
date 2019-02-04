<?php require('./partials/header.php') ?>

<link rel="stylesheet" href="css/singleGame.css">

<div class="main">
    <?php foreach($data->getSingleGame() as $game): ?>

    <section class="left">
        <div class="main_pic">  
            <img src="<?= $game->getGamePic(); ?>">
        </div>
    
        <div class="gallery_pics">
            <?php foreach($data->getGalleryPics() as $galleryPic): ?>
                <img class="myImg" src="<?= $galleryPic->getGameGalleryFirstPic(); ?>">
                <img class="myImg" src="<?= $galleryPic->getGameGallerySecondPic(); ?>">
                <img class="myImg" src="<?= $galleryPic->getGameGalleryThirdPic(); ?>">
                <img class="myImg" src="<?= $galleryPic->getGameGalleryForthPic(); ?>">
                <img class="myImg" src="<?= $galleryPic->getGameGalleryFifthPic(); ?>">
                <img class="myImg" src="<?= $galleryPic->getGameGallerySixthPic(); ?>">
            <?php endforeach; ?>

            <div class="modal">
                <img class="modal-content">
                <span class="close">&times;</span>
            </div>
        </div>
    </section>
    
    <section class="right">
        <div class="details">
            <header>
                <h1><?= $game->getGameName(); ?> | <?= $game->{'consoleName'}; ?> </h1>
                <div class="price"><?= $game->getGamePrice(); ?> лв.</div>
            </header>

            <div class="tabs">
                <a href="#" class='active'>Описание</a>

                <a href="./frontend/games/game_specifications.php?id=<?= $game->getId(); ?>">Спецификации</a>            
            </div>
        </div>

        <div class="description">
            <img src="./pics/ajax-loader/loader.gif" class="loader">

            <div class="game">
                <h2><?= $game->getGameDescriptionHeader(); ?></h2>
                <p><?= $game->getGameDescriptionBody(); ?></p>
            </div> 
        </div> 

        <div class="actions">
            <a href="add_comment.php?game_id=<?= $game->getId(); ?>" class="comment">Add comment</a>
            <a href="add_item.php?game_id=<?= $game->getId(); ?>" class="shop_cart_game">Buy game</a>    
        </div>
    </section>
        
    <?php endforeach; ?>  
</div> 

<?php if($data->{'comments_count'} > 0): ?>
    <div class="comments">
        <?php foreach($data->getAllComments() as $comment): ?>
            <div class="top_part">
                <img src="<?= $comment->{'picture'}; ?>">
                <div class="user_info">
                    <p><?= $comment->getUsername(); ?></p>
                    <p><?= $comment->getEmail(); ?></p>
                </div>
            </div>
            <div class="bottom_part">
                <p><?= $comment->getDate(); ?></p>
                <p><?= $comment->getCommentBody(); ?></p>
            </div>
            <hr>
        <?php endforeach; ?>  
    </div>
<?php endif; ?>

<script src="./js/games/singleGame.js"></script> 

<?php require('./partials/footer.php') ?>