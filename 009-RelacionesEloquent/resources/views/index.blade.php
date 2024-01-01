<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
        rel="stylesheet" 
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
        crossorigin="anonymous">
</head>
<body>
    @foreach ($users as $user)
    <ul class="list-group">
        <li class="list-group-item">Name: {{$user->name}}</li>
        <li class="list-group-item">Email: {{$user->email}}</li>
        <li class="list-group-item">Roles:
            @forelse ($user->roles as $role)
                <ul>
                    <li>rol: {{$role->name}}</li>
                    <li>addedBy: {{$role->pivot->added_by}}</li>
                    <br>
                </ul>
            @empty
                No phones found for this user.
            @endforelse
        </li>
    </ul>
    <br>
@endforeach


    <script 
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
        crossorigin="anonymous">
    </script>
</body>
</html>