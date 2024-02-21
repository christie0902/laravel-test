<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    {{-- @include('common.header', [
        'current' => 'movies'
    ]) --}}

    @foreach (range(2000, 2015) as $year)
        <a href="{{ route('movies.index', ['year' => $year]) }}">Movies from {{ $year }}</a>

        Rating:
        @foreach (range(0, 9) as $min_rating)
            <a href="{{ route('movies.index', ['year' => $year, 'min_rating' => $min_rating]) }}">{{ $min_rating }}</a>
        @endforeach
        <br>
    @endforeach

    <ul>
        @foreach ($movies as $movie)
            <li>
                <a href="{{ route('movies.detail', ['movie_id' => $movie->id]) }}">
                    <strong>{{ $movie->name }}</strong>
                </a>
                <br>
                {{ $movie->movieType->name }}
                <br>
                {{-- {{ $movie->genres->pluck('name')->join(', ') }} --}}
            </li>
        @endforeach
    </ul>
</body>
</html>