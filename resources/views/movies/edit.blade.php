<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
</head>
<body>
    @if (count($errors) > 0)
    <div>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
    @endif
    
    <form action="{{ route('movie.save', ['id' => $movie->id]) }}" method="post">
        @method('PUT')
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" value="{{ old('name', $movie->name) }}">
        <br>
        <br>
        <label for="year">Year</label>
        <input type="text" name="year" value="{{ old('year', $movie->year) }}">
        <br>
        <br>
        <label for="type">Type</label>
        <input type="text" name="type" value="{{ old('movieType->name', $movie->movieType->name) }}">
        <button>Submit</button>
    </form>
</body>
</html>