<?php

// connect to database
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'games_shop');

// define how many results you want per page
$results_per_page = 5;

// find out the number of results stored in database

$sql = "SELECT * FROM games";
$consoleType= "ALL";
$gameType= "ALL";

if(!empty($_POST)){
    $gameType = $_POST['gameType'];
    $consoleType = $_POST['consoleType'];
}else if(!empty($_GET)){
    $gameType = $_GET['gameType'];
    $consoleType = $_GET['consoleType'];
}

if($gameType !== 'ALL' && $consoleType !== 'ALL'){
    $sql = "SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id INNER JOIN genres ON games.gameGenre = genres.id WHERE consoleName = '{$consoleType}' AND gameType = '{$gameType}'";
}else if($gameType !== 'ALL'){
   $sql = "SELECT * FROM games INNER JOIN genres ON games.gameGenre = genres.id INNER JOIN consoles ON games.gameConsole = consoles.id WHERE gameType = '{$gameType}'";
}else if($consoleType !== 'ALL'){
    $sql = "SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id WHERE consoleName = '{$consoleType}'";
}else {
    $sql = "SELECT * FROM games INNER JOIN consoles ON games.gameConsole = consoles.id";
}

$result = mysqli_query($con, $sql);
$number_of_rows = mysqli_num_rows($result);

// determine number of total pages available
$number_of_pages = ceil($number_of_rows / $results_per_page);
?>

<?php for($page = 1; $page <= $number_of_pages; $page++): ?>
    <a href="games.php?page=<?= $page; ?>&consoleType=<?= $consoleType; ?>&gameType=<?= $gameType; ?>"><?= $page ?></a>
<?php endfor; ?> 