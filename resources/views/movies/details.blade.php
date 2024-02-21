<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
</head>
<body>
    <h1><?=$shawshank->name?></h1>
    <h3>Year: <?=$shawshank->year?></h3>
    <h3>Rating: <?=$shawshank->rating?></h3>
    <h3>Vote: <?=$shawshank->votes_nr?></h3>

    <form action="/movies/{{$shawshank->id}}/review" method="post">
        @csrf
        <input type="text" name="text">
        <button>Submit</button>
    </form>

    <ul>
        <h3>Reviews</h3>
        @forelse ($shawshank->review as $review)
            <li>{{ $review->text }}</li>
        @empty
            <p>No reviews available.</p>
        @endforelse

        {{-- @forelse ($collection as $item)
        Code to be executed for each item
        @empty
        Code to be executed if the collection is empty
        @endforelse --}}
    </ul>
</body>
</html>