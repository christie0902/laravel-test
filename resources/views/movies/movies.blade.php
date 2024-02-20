<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies</title>
</head>

<body>
    <h1>List of Movies</h1>
    <ul>
        <?php foreach ($movies as $movie): ?>
        <li>
            <?= $movie->name ?>
            <h2><?=$movie->movieType->name?></h2>
            <h3><?=$movie->genre->pluck('name')->join(', ')?></h3>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>