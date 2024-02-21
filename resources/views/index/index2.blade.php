<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INDEX</title>
</head>

<body>
   @foreach (range(2000,2015) as $year)
    <a href="{{route('movie.index', ['year' => $year])}}">Movie from {{$year}}</a>
   @endforeach;
   
    <h1><?=$movie->name?></h1>
    <p><?=$movie->year?></p>
    <br>
    <h2><?=$movie->movieType->name?></h2>
</body>

</html>