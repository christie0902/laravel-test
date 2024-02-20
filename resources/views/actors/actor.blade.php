<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actor</title>
</head>

<body>
    <h1>10 Actors and their movies</h1>
    <ul>
        <?php foreach($actors as $actor) : ?>
        <li>
            Name: <?=$actor->description?><br>
            Movie: <?=$actor->name?>
        </li>
        <?php endforeach; ?>
    </ul>
</body>

</html>