<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Might Pucks App</title>
</head>
<body>

<h1>Game vs. {{ $game->vsTeam }}</h1>

<div>
        <table border="0">
            <tr>
                <td>Game date:</td>
                <td>{{ $game->date }}</td>
            </tr>
            <tr>
                <td>Season:</td>
                <td>{{ $game->season_id }}</td>
            </tr>
            <tr>
                <td>Score:</td>
                <td>{{ $game->winLoss }}  {{ $game->goalsFor }} - {{ $game->goalsAgainst }}</td>
            </tr>
        </table>
</div>


<iframe id="ytplayer" type="text/html" width="640" height="390" src="{{ $game->youtubeLink }}" frameborder="0"></iframe>

<iframe id="ytplayer" type="text/html" width="640" height="390" src="https://www.youtube.com/watch?v=_I87Mf52xJI" frameborder="0"></iframe>

</body>
</html>