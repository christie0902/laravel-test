<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games</title>
</head>
<body>
    <h1>TOP 50 GAMES WITH HIGHEST RATING</h1>
    <ul>
        <?php foreach($top_games as $game) :?>
            <li>
                <h3>Title: <?=$game->game_name?></h3>
                <h4>Rating: <?=$game->rating?></h4>
                <h4>Year: <?=$game->year?></h4>
            </li>
        <?php endforeach;?>
    </ul>
</body>
</html>