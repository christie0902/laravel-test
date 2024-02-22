<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Edit movie request #{{ $movie_request->id }}</h1>
    @if (Session::has('success_message'))
        <div>
            {{ Session::get('success_message') }}
        </div>
    @endif

    @if (count($errors) > 0)
        <div>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form action="{{ route('movie-request.update', ['id' => $movie_request->id]) }}" method="post">
        @method('PUT')
        @csrf

        <select name="movie_type_id" id="movie_type_id">
            <option value="">Select a movie type</option>
            @foreach ($movie_types as $type)
                <option value="{{ $type->id }}" {{ old('movie_type_id', $movie_request->movie_type_id) == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Enter a movie name" value="{{ old('name', $movie_request->name) }}">
        <input type="text" name="full_name" placeholder="Enter your full name" value="{{ old('full_name', $movie_request->full_name) }}">
        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email', $movie_request->email) }}">
        <button type="submit">Request to add a movie</button>
    </form>
</body>
</html>