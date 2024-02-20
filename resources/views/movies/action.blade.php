<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Action movies</title>
</head>

<body>
    <h1>ACTION MOVIES</h1>
    <ul>
        <?php foreach($action_movies as $movie) :?>
        <li>
            <strong><?=$movie->name?></strong><br>
            Year: <?=$movie->year?><br>
            Rating: <?=$movie->rating?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>