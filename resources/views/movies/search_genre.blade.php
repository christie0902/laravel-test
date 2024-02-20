<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search result</title>
</head>

<body>
    <form action="/movies/genre" method="get">
        <label for="genre">What genre do you want to search?</label>
        <input type="text" name="genre">
        <button type="submit">Search</button>
    </form>

    <?php if(isset($search_result)) : ?>
    <h2>Search Results:</h2>
    <ul>
        <?php foreach ($search_result as $movie) : ?>
        <li>
            Title:
            <?= $movie->name ?><br>
            Rating:
            <?= $movie->rating ?>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endif; ?>

</body>

</html>