<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top rated movies</title>
</head>
<body>
    <h1>50 MOVIES WITH THE HIGHEST RATING</h1>
    <ul>
        <?php foreach($top_movies as $movie) :?>
            <li>
                <h3>Title: <?=$movie->name?></h3>
                <h4>Rating: <?=$movie->rating?></h4>
                <h4>Year: <?=$movie->year?></h4>
            </li>
        <?php endforeach;?>
    </ul>
    <a href="{{route('game.top')}}">See top rated games</a>
</body>
</html>