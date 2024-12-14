<html>

<head>
    <title>IZVJEŠTAJ</title>
</head>

<body>
    <p>{{ $user->name }}</p>
    <h3>{{ $user->email }}</h3>
    <h3>BROJ PREUZIMANJA:</h3>
    <h1>{{ $user->downloads->count() }}</h1>
    <h3>BROJ KOMENTARA:</h3>
    <h1>{{ $user->comments->count() }}</h1>
    <h3>BROJ LAJKOVANIH KNJIGA:</h3>
    <h1>{{ $user->favorites()->count() }}</h1>
    <h3>BROJ OBJAVLJENIH KNJIGA:</h3>
    <h1>{{ $user->books->count() }}</h1>
</body>

</html>
