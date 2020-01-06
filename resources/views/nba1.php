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
    </head>
    <body>
    <div class="container">
        <br>
        <h1>NBA</h1>
        <hr>
        <br>
        <br>
        <ul>
            <li><a href="nba1.php">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
            <li><a href="#">Test</a></li>
        </ul>
            <form id='searchform' method='get'>
                <div class="form-group row">
                    <a class="col-2" href=''>Alle Teams</a>
                    <label class="col-4" for="search">Suche nach Team ID:</label>
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
                <th>Team ID</th>
                <th>Name</th>
                <th>HomeCourt</th>
                <th>HeadCoach</th>
                <th>Founding Year</th>
            </tr>
            </thead>
            <tbody>
            @foreach($teams as $team)
                <tr>
                    <td>{{ $team->id }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->home_court }}</td>
                    <td>{{ $team->head_coach }}</td>
                    <td>{{ $team->founding_year}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </body>
</html>
