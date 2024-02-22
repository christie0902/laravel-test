<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Movie Requests List</h1>

    {{-- Here will be a new movie request from --}}
    {{-- movie_type_id (select), name (string), full_name (string), email (string)--}}

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

    <form action="{{ route('movie-request.store') }}" method="POST">
        @csrf

        <select name="movie_type_id" id="movie_type_id">
            <option value="">Select a movie type</option>
            @foreach ($movie_types as $type)
                <option value="{{ $type->id }}" {{ old('movie_type_id') == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
            @endforeach
        </select>
        <input type="text" name="name" placeholder="Enter a movie name" value="{{ old('name') }}">
        <input type="text" name="full_name" placeholder="Enter your full name" value="{{ old('full_name') }}">
        <input type="email" name="email" placeholder="Enter your email" value="{{ old('email') }}">
        <button type="submit">Request to add a movie</button>
    </form>

    <ul>
        @foreach ($movie_requests as $movie_request)
            <li>
                Person: {{ $movie_request->full_name }} <br>
                Person email: {{ $movie_request->email }} <br>
                Movie name: {{ $movie_request->name }} <br>
                <a href="{{ route('movie-request.edit', ['id' => $movie_request->id]) }}">Edit</a>
            </li>
        @endforeach
    </ul>
</body>
</html>