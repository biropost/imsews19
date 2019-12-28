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
            <form id='searchform' method='get'>
                <div class="form-group row">
                    <a class="col-2" href='index.php'>Alle Spieler</a>
                    <label class="col-4" for="search">Suche nach Team ID:</label>
                    <input id='search' class="form-control col-5" name='search' type='text' size='20' value='<?php if (isset($_GET['search'])) echo $_GET['search']; ?>' />
                    <div class="col-1">
                        <input id='submit' class="btn btn-primary" type='submit' value='Los!' />
                    </div>
                </div>
            </form>
        <?php
        // check if search view of list view
        if (isset($_GET['search'])) {
            $results = DB::table('spieler')->where('tid', $_GET['search'])->get();
        } else {
            $results = DB::table('spieler')->get();
        }
        ?>
        <br>
        <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>Spieler ID</th>
                <th>Name</th>
                <th>Größe</th>
                <th>Gewicht</th>
                <th>Trikotnr</th>
                <th>Position</th>
                <th>Team ID</th>
            </tr>
            </thead>
            <tbody>
            @foreach($results as $data)
                <tr>
                    <td>{{ $data->id }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->groesse }}</td>
                    <td>{{ $data->gewicht }}</td>
                    <td>{{ $data->trikotnr }}</td>
                    <td>{{ $data->position }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        </div>
    </div>
    </body>
</html>
