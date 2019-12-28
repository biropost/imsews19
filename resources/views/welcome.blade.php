<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>nba</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        </div>
        <div>
            <form id='searchform' action='nba1.php' method='get'>
                <a href='nba1.php'>Alle Spieler</a> ---
                Suche nach Team ID:
                <input id='search' name='search' type='text' size='20' value='<?php if (isset($_GET['search'])) echo $_GET['search']; ?>' />
                <input id='submit' type='submit' value='Los!' />
            </form>
        </div>
        <?php
        // check if search view of list view
        if (isset($_GET['search'])) {
            $results = DB::select('select * from users where id = :id', ['id' => 1]);
            //$sql = "SELECT * FROM Spieler WHERE TID = '" . $_GET['search'] . "'";
        } else {
            $results = DB::table('spieler')->get();
            //$results = DB::select('select * from spieler');
            //$sql = "select * from spieler";
        }

        // execute sql statement
        ?>
        <table style='border: 1px solid #DDDDDD'>
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
    </body>
</html>
