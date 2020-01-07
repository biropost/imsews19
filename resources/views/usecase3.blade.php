<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>nba</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <br>
    <h1>NBA</h1>
    <hr>
    <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Use-Cases
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="/">Use-Case 1 - Players in a Team</a>
            <a class="dropdown-item" href="/usecase2">Use-Case 2 - Players and their Sponsors</a>
            <a class="dropdown-item" href="/usecase3">Use-Case 3 - Teams playing Games (main use-case)</a>
            <a class="dropdown-item" href="/usecase4">Use-Case 4 - Teamperformances in Games (reporting)</a>
        </div>
    </div>
    <br>
    <br>
    <form id='searchform' method='get'>
        <div class="form-group row">
            <a class="col-2" href='/usecase3'>Alle Games</a>
            <label class="col-3" for="search">Suche nach Game ID:</label>
            <input id='search' class="form-control col-5" name='search' type='text' size='20' value='<?php if (isset($_GET['search'])) echo $_GET['search']; ?>' />
            <div class="col-1">
                <input id='submit' class="btn btn-primary" type='submit' value='Los!' />
            </div>
        </div>
    </form>

    <br>
    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>name</th>
                <th>home court</th>
                <th>head coach</th>
                <th>founding year</th>
                <th>team id</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->home_court}}</td>
                    <td>{{ $team->head_coach }}</td>
                    <td>{{ $team->founding_year }}</td>
                    <td>{{ $team->id }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>