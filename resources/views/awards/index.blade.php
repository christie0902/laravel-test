<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Awards</title>
</head>
<body>
    <h1>Movie Awards</h1>
    <p>Here are some movie awards</p>

    <ul>
        <?php foreach ($awards as $awards_name) :?>
            <li>
                <?= $awards_name?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>