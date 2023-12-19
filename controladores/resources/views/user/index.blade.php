<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <h1>User List</h1>

    {{-- Lista de usuarios --}}
    @if ($users->isEmpty())
        <p>The user list is empty</p>
    @else
    <ul class="list-group">
        @foreach ($users as $user )     
        <li class="list-group-item">{{$user->name}}</li>
        {{-- <li class="list-group-item" aria-current="true"></li>
        <li class="list-group-item"></li>
        <li class="list-group-item"></li>
        <li class="list-group-item"></li> --}}
        @endforeach
      </ul>
    @endif
    {{-- Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>